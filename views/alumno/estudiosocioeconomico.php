	<div class="container">
		<div class="row">
			<div class="span8 offset2">
				<table class='table table-striped table-bordered'>
					<thead>
						
						<tr>

							<th><h4>1. Datos de identificación</h4></th>
							<th></th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Matricula:</td>
							<td>
								<input class="spam3" placeholder="Matricula" type="text" value="<?php echo $this->usuario->matricula; ?>">
							</td>
						</tr>
						<tr>
							<td>Nombre:</td>
							<td>
								<input class="spam3" placeholder="Nombre" type="text" value="<?php echo $this->usuario->nombre; ?>">
							</td>
							
						</tr>
						<tr>
							<td>Apellido Paterno:</td>
							<td>
								<input class="spam3" placeholder="Apellido Paterno" type="text" value="<?php echo $this->usuario->apellidopat; ?>">
							</td>
							
						</tr>
						<tr>
							<td>Apellido Materno:</td>
							<td>
								<input class="spam3" placeholder="Apellido Materno" type="text" value="<?php echo $this->usuario->apellidomat; ?>">
							</td>
						</tr>
						<tr>
							<td>Sexo:</td>
							<td>
								<select name="sexo" id="sexo">
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
							</td>
						</tr>
						<tr>
							<th><h5>Lugar de residencia</h5></th>
						</tr>
						<tr>
							<td>Calle y número (exterior-interior):</td>
							<td><input class="spam3" placeholder="Calle o número" type="text"></td>
						</tr>
						<tr>
							<td>Colonia:</td>
							<td><input class="spam3" placeholder="Colonia" type="text"></td>
						</tr>
						<tr>
							<td>Estado:</td>
							<td><input class="spam3" placeholder="Estado" type="text"></td>
						</tr>
						<tr>
							<td>Delegación/Municipio:</td>
							<td><input class="spam3" placeholder="Delegación/Municipio" type="text"></td>
						</tr>
						<tr>
							<td>Teléfono particular (sin guioner y espacios):</td>
							<td><input class="spam3" placeholder="Teléfono particular" type="text"></td>
						</tr>
						<tr>
							<td>Teléfono celular (sin guioner y espacios):</td>
							<td><input class="spam3" placeholder="Teléfono celular" type="text"></td>
						</tr>
						<tr>
							<td>Código postal:</td>
							<td><input class="spam3" placeholder="Código postal" type="text"></td>
						</tr>
						<tr>
							<td><h5>Lugar de Nacimiento</h5></td>
						</tr>
						<tr>
							<td>Estado:</td>
							<td><input class="spam3" placeholder="Estado" type="text"></td>
						</tr>
						<tr>
							<td>Delegación/Municipio:</td>
							<td><input class="spam3" placeholder="Delegación/Municipio" type="text"></td>
						</tr>
						<tr>
							<td>Ciudad o población:</td>
							<td><input class="spam3" placeholder="Ciudad o población" type="text"></td>
						</tr>
						<tr>
							<td>CURP:</td>
							<td><input class="spam3" placeholder="CURP" type="text"></td>
						</tr>
						<tr>
							<td>RFC:</td>
							<td><input class="spam3" placeholder="RFC" type="text"></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input class="spam3" placeholder="E-mail" type="text"></td>
						</tr>
						<tr>
							<td><h4>2.Datos de identificación</h4></td>
						</tr>
						<tr>
							<td>1. Para realizar tus estudios de educación superior,¿tuviste qué cambiar tu ciudad de residencia?
							</td>
							<td><select name="" size="1" id="">
									<option value="">si</option>
									<option value="">no</option>
								</select></td>
						</tr>
						<tr>
							<td>2. ¿Cuanto tiempo te toma llegar de tu casa a tu escuela?</td>
							<td>
								<select name="" id="">
									<option value="">Menos de 15 minutos.</option>
									<option value="">De 16 minutos a 30 minutos.</option>
									<option value="">De 31 minutos a 1 hora.</option>
									<option value="">De 1 a 2 horas.</option>
									<option value="">Más de 2 horas.</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>3. ¿Dependes economicamente de tus padres o tutores?</td>
							<td>
								<select name="" id="">
									<option value="">Sí, totalmente</option>
									<option value="">Sí, medianamente</option>
									<option value="">Casi no dependo de mis padres</option>
									<option value="">No, dependo de mis padres</option>
									<option value="">No, ya que soy el principal sostén de mi familia</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>4. Estado civil</td>
							<td>
								<select name="" id="">
									<option value="">Soltero(a)</option>
									<option value="">Casado(a)</option>
									<option value="">Unión Libre</option>
									<option value="">Separado(a)/Viuda(o)/Divorciado(a)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>5. Número de hijos</td>
							<td>
								<select name="" id="">
									<option value="">Ninguno</option>
									<option value="">Uno</option>
									<option value="">Dos</option>
									<option value="">Tres</option>
									<option value="">Cuatro o más</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>6. ¿En la actualidad Trabajas?<h6>(situación laboral)</h6></td>
							<td>
								<select name="" id="">
									<option value="">Nunca he trabajado</option>
									<option value="">He trabajado anteriormente pero actualmente no trabajo</option>
									<option value="">Sí, con más de 20 horas a la semana</option>
									<option value="">Sí, con menos de 20 horas a la semana</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>7. ¿Con quién vives actualmente?</td>
							<td><select name="" id="">
								<option value="">Con mis padres</option>
								<option value="">Con mi mamá</option>
								<option value="">Con mi papá</option>
								<option value="">Compañeros</option>
								<option value="">Sólo con hermanos</option>
								<option value="">Sólo(a) en vivienda independiente</option>
								<option value="">Cónyugue o pereja</option>
								<option value="">Otros familiares</option>
								<option value="">Otro</option>
							</select></td>
						</tr>
						<tr><td><h4>3. Datos de la vivienda <h6>(Proporciona los datos de la vivienda conforme a las indicaciones de la siguiente tabla)</h6></h4></td></tr>
						<tr>
							<td>8. La casa donde vive tu familia es:</td>
							<td>
								<select name="" id="">
									<option value="">Propia</option>
									<option value="">Alquilada</option>
									<option value="">Prestada</option>
									<option value="">Otra</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>9. Material del techo de la vivienda (marcar el predominante)</td>
							<td>
								<select name="" id="">
									<option value="">Lámina (cartón, asbesto, madera)</option>
									<option value="">Firme de concreto, incluye teja o algún otro materia sobrepuesto</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>10. Material del piso de la vivienda (marcar el predominante)</td>
							<td>
								<select name="" id="">
									<option value="">Tierra</option>
									<option value="">Cemento</option>
									<option value="">Mosaico, loseta, madera laminada</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><h4>4. Equipamiento doméstico</h4></td>
						</tr>
						<tr>
							<td>11. Señala el número de los siguientes aparatoscon que cuentas en casa</td>
						</tr>
						<tr>
							<td><h6>Camas</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Lavadora de ropa</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Secadora de ropa</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Calentador de agua</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Televisor</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Computadora personal</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Teléfono local o celular</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Reproductor de musica</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Estufa de horno</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td><h6>Refrigerador</h6></td>
							<td><h6><select name="" id="">
								<option value="">ninguno(a)</option>
								<option value="">Uno</option>
								<option value="">Dos</option>
								<option value="">Tres</option>
								<option value="">Cuatro o mas</option>
							</select></h6></td>
						</tr>
						<tr>
							<td>12. ¿Cuales son los servicios con que cuentas en tu casa?</td>
						</tr>
						<tr>
							<td><h6>Agua potable</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Luz eléctrica</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Drenaje</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Pavimento</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Transporte</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Linea telefónica</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Internet</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h4>4. Programa de becas</h4></td>
						</tr>
						<tr>
							<td>13. ¿Cuál es la razón más importante que te impulsóa solicitar la beca? </td>
							<td><select name="" id="">
								<option value="">La situación economica familiar actual</option>
								<option value="">Por sugerencia de mis padres</option>
								<option value="">Me impulsaron mis compañeros</option>
								<option value="">No alcanzaba para comprar material de la escuela</option>
								<option value="">Obtener recursos parr hacer otras actividadesacadémicas</option>
								<option value="">El aumentar la posibilidad de completar mi vida cultural extracurricular</option>
							</select></td>
						</tr>
						<tr>
							<td>14. ¿En que porcetaje conces o dominas los siguientes idiomas?</td>
						</tr>
						<tr>
							<td><h6>Inglés</h6></td>
							<td><h6><select name="" id="">
								<option value="">00%</option>
								<option value="">25%</option>
								<option value="">50%</option>
								<option value="">75%</option>
								<option value="">100%</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Lengua índijena</h6></td>
							<td><h6><select name="" id="">
								<option value="">00%</option>
								<option value="">25%</option>
								<option value="">50%</option>
								<option value="">75%</option>
								<option value="">100%</option>
								</select></h6></td>
						</tr>
						<tr>
							<td>15. ¿Cuenta con alguna(a) de las siguientes becas?</td>
						</tr>
						<tr>
							<td><h6>Pronabes</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Oportunidades</h6></td>
							<td><h6><select name="" id="">
								<option value="">Si</option>
								<option value="">No</option>
								</select></h6></td>
						</tr>
						<tr>
							<td><h6>Otra (Especificar):</h6></td>
							<td><input type="text" class="input-xlarge" id="input01"></td>
						</tr>
						<tr>
							<td><h4>6. Recursos para realizar tus estudios</h4></td>
						</tr>
						<tr>
							<td>16. ¿En que medida consideras que cuentas con los siguientesapoyos para realizar tus estudios?</td>
						</tr>
						<tr>
							<td><h6>a) Recursos para transporte</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td><h6>b) Recursos para actividades recreativas y culturales</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td><h6>c) Libros necesarios para el estudio</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td><h6>d) Libros de consulta general</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td><h6>e) Dinero suficiente para comer en la escuela</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td><h6>f) Pago de inscripción o reinscripción a la escuela</h6></td>
							<td><select name="" id="">
								<option value="">Siempre</option>
								<option value="">La mayoria de las veces</option>
								<option value="">Algunas veces</option>
								<option value="">Casi nunca</option>
								<option value="">Nunca</option>
							</select></td>
						</tr>
						<tr>
							<td>17. ¿En que te transportas a la escuela?</td>
							<td><select name="" id="">
								<option value="">Transporte publico</option>
								<option value="">Transporte privado (Automovil, Motocicleta)</option>
								<option value="">Caminando</option>
								<option value="">Bicicleta</option>
							</select></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>