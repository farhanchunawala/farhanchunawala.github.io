app.component('addproduct', {
	props: {},
	template: /*html*/ `
	<div id="accordion">
		<div class="card" style="width:160px">
		<div class="card-header"><a class="btn" data-bs-toggle="collapse" href="#collapse1" style="color:black"><b>Add Product</b></a></div>
		<div id="collapse1" class="collapse show" data-bs-parent="#accordion"><div class="card-body px-2 py-0">
		
		</div></div></div>
	</div>
	`,
	data() {
		return {
			products:{}
		}
	},
	methods: {},
	computed: {},
	created() {
		axios.post('pdo_select.php', {
		sql: 'SELECT * FROM products'
		}).then(response => { this.products = response.data
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)	
	}
})