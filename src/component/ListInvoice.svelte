<script>
    export let titleList = 'titleList';
    export let listItem = [];
    let filtredlistItem = [...listItem];
    let filter = '';

    const search = (list, text) => {
        return list.filter(i =>{
            return i.value.toLowerCase().includes(text.toLowerCase()) || (i.amount+'').toLowerCase().includes(text.toLowerCase())
        });
    }
    const filterList = (e) => {
        filter = e.target.value;
        filtredlistItem = search(listItem,filter);
        console.log(filtredlistItem);
    }
</script>
<section class={open ? "visible" : 'invisible'}>
    <h2>{titleList}</h2>
    <input id='' on:input={filterList} value="{filter}"/>    
    <ul>
        {#each filtredlistItem as item}
        <li>{item.value} : {item.amount}</li>
        {/each}
    </ul>
</section>

<style>
	h2 {
        color: chartreuse;
    }

    .visible {
       padding : 10px;
    }
</style>