<script>
	import ListInvoice from './component/ListInvoice.svelte';
	import axios from 'axios';
	const taza = 35;
	const amount = 25
	let listInvoice = {
		titleList : 'Invoice',
		listItem : []
	};
	console.log(listInvoice);
	const total = amount - (listInvoice.listItem.reduce((acc, cur) => ({amount: acc.amount + cur.amount}),{"amount" : 0}).amount);
	console.log(total);
	let amountPrint = `${amount} $`;
	let totalPrint = `${total} $`;
	const dolares = () => {
		amountPrint = `${amount} $`;
		totalPrint = `${total} $`;
	} 
	const cordoba = () => {
		amountPrint = `${amount * taza} c$`;
		totalPrint = `${total * taza} $`;
	}
	
	$: getInvoices();

	const getInvoices = () => {
		axios.get(`https://oficinavirtual-munck.firebaseio.com/invoices/2548f40a-86fc-11eb-8dcd-0242ac130003.json`)
		.then(res => {
			console.log(res.data);
			const {users, invoices } = res.data;
			console.log(res.data);
			listInvoice = {
				titleList : 'Invoice',
				listItem : [
					...invoices
				]
			}
			console.log(listInvoice);
		})
	}

	let toggle = false;
	const togglelist = () => {
		toggle = !toggle;
		getInvoices()
	}
</script>

<main>
	<h1>{amountPrint}</h1>
	<p> su balance es de {totalPrint}</p>
	<button class='btn btn-light' on:click={cordoba}>cordoba</button>
	<button class='btn btn-light' on:click={dolares}>dolares</button>
	<button class='btn btn-primary'on:click={togglelist}>open invoice</button>
	{#if toggle}
	<ListInvoice {...listInvoice}/>
	{/if}
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h1 {
		color: #ff3e00;
		text-transform: uppercase;
		font-size: 4em;
		font-weight: 100;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>