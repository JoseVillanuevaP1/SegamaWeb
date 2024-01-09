<template>
    <div id="contact" class="contact">
		<div class="container">
			<div class="agileits-title"> 
				<div class="agileits-title-left">
					<h3>Contacta con Nosotros</h3>
				</div>
				<div class="agileits-title-right">
					<p class="para">Estamos listos para ayudarte, registra tus datos</p>
				</div>
			</div>  
			<div class="contact-w3ls-row">
				<form @submit.prevent="sendEmail">
					<div class="col-md-12 col-sm-12 contact-left agileits-w3layouts">
						<input type="text" name="names" v-model="this.form.nombres" placeholder="Nombres" required="">
						<input class="email" name="last_names" v-model="this.form.apellidos" type="text" placeholder="Apellidos" required="">
						<input type="text" name="number" v-model="this.form.numerotelefono" placeholder="Numero de Telefono" required="">
						<input class="email" name="email" v-model="this.form.email" type="email" placeholder="Correo Electronico" required="">
                        <textarea name="Message" placeholder="Escribemos un mensaje..." v-model="this.form.mensaje" required=""></textarea>
						<input type="submit" value="ENVIAR">
					</div> 
					<div class="clearfix"> </div> 
				</form>
			</div>  
		</div>
	</div>

</template>

<script>
    export default {
        data() {
            return{
                form:{
                    nombres:"",
                    apellidos:"",
                    numerotelefono:"",
                    email:"",
                    mensaje:""
                }
            }
        },

        methods:{
            
            resetForm(){

                this.form =  {
                    nombres:"",
                    apellidos:"",
                    numerotelefono:"",
                    email:"",
                    mensaje:""
                }

            },
            async sendEmail(){

                const body = {...this.form}

                const result = await axios.post('api/send-email-app-web', {...body}).then(async (result) => {
                if (result.status === 200) {
                    console.log(result)
                    this.resetForm();
                }}).catch((err) => {
                    console.log(err)
                });
            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
