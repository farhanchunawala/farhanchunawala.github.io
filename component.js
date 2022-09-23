app.component('mycomponent', {
	props: {},
	template: /*html*/ `
	
		<a class="btn" @click="add()" style="border: 1px solid lightgrey"><b>Add</b></a>
		<table class="table">
			<thead>
				<th v-for="(x,kx) in products[0]" :key="kx">{{kx}}</th>
			</thead>
			<tbody>
				<tr v-for="(product,product_key) in products" :key="product_key" >
					<td v-for="(y,ky) in product" :key="ky">
						<div v-if="ky=='product_image'">
							<upload :pk="product_key" @sendfilename="setfilename"></upload><br/>
							<div v-for="(i,ki) in image_list(product_key)" :key="ki">
								<!--<img :src="'uploads/'+this.products[product_key]['product_image']" height="100" width="100">-->
								<img :src="'uploads/'+i" height="100" width="100">
							</div>
							{{this.products[product_key]['product_image']}}
						</div>
						<input v-else type="text" class="myInput" v-model="product[ky]" />
					</td>
					<td v-if="product">
						<a class="btn" @click="save(product_key)" style="border: 1px solid lightgrey"><b>Save</b></a>
						<a class="btn" @click="remove(product_key)" style="border: 1px solid lightgrey"><b>Delete</b></a>
					</td>
					</tr>
			</tbody>
		</table>
	`,
	data() {
		return {
			products:{}
			// imgArr: []
		}
	},
	methods: {
		setfilename(filenames, key) {
			this.products[key]['product_image'] = filenames
		},
		save(key) {
			axios.post('pdo_update.php', {
			myArr:this.products[key],  tbl:'products',  whr:'WHERE id='+this.products[key]['id']
			}).then(response => {
				if(response.data) alert(response.data);
				else alert ('saved');
			}).catch(error => { console.log(error.response.data); this.errored1 = true
			}).finally(() => this.loading1 = false)
		},
		add() {
			if (this.products.length=='0') this.products[this.products.length]={"id":1, "product_name":'', "product_price":0, "product_description":'', "product_image":'',};
			else this.products[this.products.length]={"id":this.products[this.products.length-1]['id']+1, "product_name":'', "product_price":0, "product_description":'', "product_image":'',};
			
			axios.post('pdo_insert.php', {
			myArr:this.products[this.products.length-1],  tbl:'products'
			}).then(response => {
				if(response.data) alert(response.data);
			}).catch(error => { console.log(error.response.data); this.errored1 = true
			}).finally(() => this.loading1 = false)
		},
		remove(key) {
			axios.post('pdo_delete.php', {
			tbl:'products',  whr:'WHERE id='+this.products[key]['id']
			}).then(response => {
				if(response.data) alert(response.data);
				// else alert ('deleted');
			}).catch(error => { console.log(error.response.data); this.errored1 = true
			}).finally(() => this.loading1 = false);
			
			this.products.splice(key, 1);
		}
	},
	computed: {
		image_list() { return (key) => {
			let imgArr=[];
			imgArr = this.products[key]['product_image'].toString().split(' ');
			imgArr.pop();
			return imgArr;
		}},
	},
	created() {
		axios.post('pdo_select.php', {
		sql: 'SELECT * FROM products'
		}).then(response => { this.products = response.data
		}).catch(error => { console.log(error); this.errored1 = true
		}).finally(() => this.loading1 = false)	
	}
})