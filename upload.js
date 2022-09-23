app.component('upload', {
	props: {
		pk:	{ type: Number },
	},
	template: /*html*/ `
		<input ref="uploadfiles" @change="uploadFile()"  type="file" multiple>
	`,
	data() {
		return {
			uploadfiles: '',
			tempname:'',
			filenames:[]
		}
	},
	methods: {
		uploadFile() {
			let formData = new FormData();
			let myfiles = this.$refs['uploadfiles']['files'];
			
			let dir = 'uploads/';
			let filename = [];
			let fc = myfiles.length;
			for (let ix=0; ix<fc; ix++) {
				formData.append("files[]", myfiles[ix]);
				formData.append('filename[]', filename[ix]);
			}
			formData.append('dir', dir);
			
			axios.post('upload.php', formData, {
				headers: { 'Content-Type': 'multipart/form-data' }
			}).then(response => { this.filenames = response.data
				this.$emit('sendfilename', this.filenames, this.pk);
				alert(response.data);
			}).catch(function (error) { console.log(error.response.data); });
			
		}
	}
})