<template>
    <section class="container">
        <div class="row">
            <div class="e12 col-sm-6">
                   <div>
                        <div>
                            <div class="ca">
                                 <h4 class="cabeza">Contacto</h4>
                             </div>
                             <div class="cuerpo">
                                 <div style="margin-left:10px;"><span class="emo fas fa-map-marker-alt"></span> </div>
                                 <div class="parrafo"><p>Lun - Vie: 8:00am - 5:00pm <br/>Sab: 8:00am - 12:00pm</p></div>
                             </div>    
                             <div class="cuerpo">
                                 <div style="margin-left:10px;"><span class="emo fas fa-mobile-alt"></span> </div>
                                 <div class="parrafo"><p>(+51) 987 785 052</p></div>
                             </div>
                             <div class="cuerpo">
                                  <div><span class="emo fas fa-envelope"></span> </div>
                                 <div class="parrafo"><p>informes@roundtableperu.com</p></div>
                             </div>
                            

                        </div>
                    </div>
            </div>
            <div class="e12 col-sm-6">
                
                    <div class="ce">
                        <h4 class="cabeza">Formulario de contacto</h4>
                    </div>
                    <div class="cuerpo">
                        <form action="">
                           <ul class="lista">
                               <li class="lis">
                                   <label for="" name="nombre">Nombres<span>*</span></label>
                                   <div class="caja">
                                       <span class=ee style="display:inline-block; padding-right:16px;">
                                           <input class="ee12" type="text" placeholder=" Nombres" name="nombre" v-model="nombre">
                                       </span>
                                       <span class="ee" style="display:inline-block; ">
                                           <input type="text" class="ee12" placeholder=" Apellidos" v-model="apellidos">
                                       </span>
                                   </div>
                               </li>
                               <li class="lis">
                                   <label  for="" name="empresa">Empresa<span>*</span></label>
                                   <div class="caja" >
                                       <input class="ee12" type="text" name="empresa" placeholder=" Razón social" style="width:100%;" v-model="razon_social">
                                   </div>
                               </li>
                               <li class="lis">
                                   <label  for="" name="correo">Correo electrónico<span>*</span></label>
                                   <div class="caja" >
                                       <input type="text" class="ee12" name="correo" placeholder=" Correo" style="width:100%;" v-model="email">
                                   </div>
                               </li>
                               <li class="lis">
                                   <label for="" name="mensaje">Tu mensaje</label>
                                   <div class="caja">
                                       <textarea style="resize:none; width:100%;" placeholder="Mensaje..." name="mensaje" rows="4" maxlength="255" v-model="mensaje"></textarea>
                                   </div>
                               </li>
                               <li class="lis">
                                   	<button v-if="!sending" type="button" @click="sendEmail">Enviar</button>
                               		<button v-else class="disabled" disabled><i class="fas fa-spinner fa-spin"></i> Enviando</button>
                               </li>
                            </ul> 
                        </form>
                     </div>     
            </div>               
        </div> 
    </section>     
</template>
<script>
    export default{
		data() {
			return {
				nombre: '',
				apellidos: '',
				email: '',
				razon_social: '',
				mensaje: '',
				sending: false,
			}
		},
		methods: {
			sendEmail: function() {
				let { value, message } = this.verifyForm()
				if (value) {
					this.sending = true
					axios.post('/contact', {
						name: this.nombre,
						last_name: this.apellidos,
						email: this.email,
						company_name: this.razon_social,
						message: this.mensaje,
					})
						.then(res => {
							console.log(res.data)
							this.sending = false

							Swal.fire({ title: 'Mensaje enviado con éxito', type: 'success' })
						})
						.catch(err => {
							console.log(err.response.data)
						})
				} else {
					Swal.fire({ title: message, type: 'warning' })
				}
			},
			verifyForm() {
				let value = true
				let message = ''
				if (this.nombre == '' || this.apellidos == '' || this.email == '' || this.razon_social == '' || this.mensaje == '') {
					value = false
					message = 'Debes completar todos los campos'
				} else {
					if (this.mensaje.length > 255) {
						value = false
						message = 'La longitud del mensaje es de maximo 255 caracteres'
					} else {
						if (this.nombre.length >= 100 || this.apellidos.length >= 100 || this.email.length >= 100 || this.razon_social >= 250) {
							value = false
							message = 'La longitud de los datos debe ser de máximo 100 caracteres'
						}
					}
				}

				return { value, message }
			}
		}
	}
</script>
<style >

.e12{
    margin-top: -100px;
    /*width:50%;*/
    padding-left: 0px;
    padding-right: 0px;
   
}
.ca .cabeza{
    color: #ffffff;
    background-image: linear-gradient(to right, #cb2d3e 0%, #cb2d3e 51%, #ef473a 100%);
    margin-bottom: 40px;
    padding-top: 130px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
}
.ce .cabeza{
    color: #ffffff!important;
    background-image: linear-gradient(to right, #000000 0%, #020202 51%, #0b0e0a 100%);
    margin-bottom: 40px!important;
    padding-top: 130px!important;
    padding-bottom: 20px!important;
    padding-left: 20px!important;
    padding-right: 20px!important;
}
.cabeza{
    position: relative;
    display: inline-block;
    width: auto;
    text-decoration: none;
    font-weight:500;
}
.emo{
    float:left;
    font-size: 2.6em;
    color: #ce1b28;
    
}

.cuerpo{
    color:#606961;
    margin-top: 10px;
    font-size: 16px;
    font-weight: 400;
}
.parrafo{
    margin-left: 60px;
    margin-bottom: 40px;
    font-family: 'Roboto',sans-serif;
    /*font-style: normal;*/
}
.lista{
    list-style-type: none;
}
.lis{
    margin-top: 16px;
    padding-right: 16px;
}
.lis>label{
    font-family: 'Roboto',sans-serif;
    /*font-size: normal;*/
}
.lis label>span{
    color: #ce1b28;
    font-size: 1.3em;
    font-weight: 500;
}
.caja> .ee12{
    height: 2.8em;
}
.caja> .ee{
    width: 49%;
}
.caja> .ee .ee12{
    margin-top:4px;
    border-color: #7777;
    height: 2.8em;
    width:100%;
    border-style: solid;
    padding:7px 7px 7px 7px;
    border-width: 2px;
}
.caja > .ee12{
    margin-top:4px;
    border-color: #7777;
    height: 2.8em;
    width:266px;
    border-style: solid;
    padding:7px 7px 7px 7px;
    border-width: 2px;
}
.caja >textarea{
    margin-top:4px;
    border-color: #7777;
    border-style: solid;
    border-width: 2px;
    padding:7px 7px 7px 7px;
}
.lis >button{
        background-image: linear-gradient(to right, #56ab2f 0%, #a8e063 51%, #56ab2f 100%);
		transition: 0.5s;
		background-size: 200% auto;
		border: none;
		color: white;
		padding: 7px 15px;
		text-align: center;
		text-decoration: none;
		font-size: 15px;
		font-family: 'Roboto',sans-serif;
		border-radius: 3px;
        width: 100%;
}
.lis >button:hover{
    background-position: right center;
		color:rgb(231, 255, 255);
}
::-webkit-input-placeholder { color: #7777; }
input[class="ee12"]:focus{
  outline: 2px solid #ef473a;  
}
textarea:focus{
    outline: 2px solid  #ef473a;  
}
@media screen and (max-width: 768px){
    .e12{
        float: left;
        margin-top: 20px;
        margin-left: 15px;
    }
}

</style>
