<template>
    <div class="card prueba">
		<div class="card-header">

			COMPONENTE DE PRUEBA

		</div>
		<div class="card-body">
			



		</div>

	</div>
</template>

<script>
    export default {
        
		methods:{
			saludar(){
				console.log("Hola")
			}


		},
		async mounted() {
            console.log('Component mounted.')
			await this.saludar()
        },
    }
</script>
<style>
    .prueba{

		background-color: red;

	}
</style>