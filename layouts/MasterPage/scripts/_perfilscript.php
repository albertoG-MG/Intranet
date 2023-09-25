<script>
	var delete_switch="false";
	const tabElements = [{
			id: 'general',
			triggerEl: document.querySelector('#general-tab'),
			targetEl: document.querySelector('#general'),
			value: 'Información general'
		},
		{
			id: 'password',
			triggerEl: document.querySelector('#password-tab'),
			targetEl: document.querySelector('#password'),
			value: 'Cambiar contraseña'
		}<?php if($switchExpedientes == "true"){ echo ","; ?>
		{
			id: 'expediente',
			triggerEl: document.querySelector('#expediente-tab'),
			targetEl: document.querySelector('#expediente'),
			value: 'Mostrar expediente'
		}
		<?php } ?>
		<?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){ echo ",";  ?>
		{
			id: 'empleados',
			triggerEl: document.querySelector('#empleados-tab'),
			targetEl: document.querySelector('#empleados'),
			value: 'Mostrar mis empleados'
		}
		<?php } ?>
	];

	tabElements.forEach((tab) => {
		tab.triggerEl.addEventListener('click', () => {
			target = tab;
			titulo = document.getElementById('tabTitulo');

			tabElements.forEach((t) => {
				t.targetEl.classList.remove("block")
				t.targetEl.classList.add("hidden");
				t.triggerEl.classList.remove("bg-[#27ceeb]", "text-white", "active");
				t.triggerEl.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
				"focus:bg-slate-100", "focus:text-slate-800");
				t.triggerEl.firstElementChild.classList.add("text-slate-400", "transition-colors", 
				"group-hover:text-slate-500", "group-focus:text-slate-500");
			})
			titulo.textContent = target.value;
			target.targetEl.classList.remove("hidden");
			target.targetEl.classList.add("block");
			target.triggerEl.classList.add("bg-[#27ceeb]", "text-white", "active");
			target.triggerEl.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
			"focus:bg-slate-100", "focus:text-slate-800");
			target.triggerEl.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
			"group-hover:text-slate-500", "group-focus:text-slate-500");
			if(target.id == "general"){
				resetFormValidator("#formPassword");
				$('#formPassword').unbind('submit');
				formGeneral();
			}else if(target.id == "password"){
				resetFormValidator("#formGeneral");
				$('#formGeneral').unbind('submit');
				formPassword();
			}
		})
	});
	<?php 
		if($switchExpedientes == "true"){ 
   			if($checkcurrentuserxexpediente  > 0){	
	?>
	const menuExpedientes = [{
			id: 'datosG',
			triggerMenu: document.querySelector('#datosG-tab'),
			targetMenu: document.querySelector('#datosG')
		},
		{
			id: 'datosA',
			triggerMenu: document.querySelector('#datosA-tab'),
			targetMenu: document.querySelector('#datosA')
		},
		{
			id: 'datosB',
			triggerMenu: document.querySelector('#datosB-tab'),
			targetMenu: document.querySelector('#datosB')
		},
		{
			id: 'documentos',
			triggerMenu: document.querySelector('#documentos-tab'),
			targetMenu: document.querySelector('#documentos')
		}
	];

	menuExpedientes.forEach((menu) => {
		menu.triggerMenu.addEventListener('click', () => {
			objective = menu;

			menuExpedientes.forEach((trigger) => {
				trigger.targetMenu.classList.remove("block")
				trigger.targetMenu.classList.add("hidden");
				trigger.triggerMenu.classList.remove("bg-[#27ceeb]", "text-white", "menu-active");
				trigger.triggerMenu.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
				"focus:bg-slate-100", "focus:text-slate-800");
				trigger.triggerMenu.firstElementChild.classList.add("text-slate-400", "transition-colors", 
				"group-hover:text-slate-500", "group-focus:text-slate-500");
			})
			objective.targetMenu.classList.remove("hidden");
			objective.targetMenu.classList.add("block");
			objective.triggerMenu.classList.add("bg-[#27ceeb]", "text-white", "menu-active");
			objective.triggerMenu.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
			"focus:bg-slate-100", "focus:text-slate-800");
			objective.triggerMenu.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
			"group-hover:text-slate-500", "group-focus:text-slate-500");
		})
	});
	<?php 
			}
		}
	?>

	<?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){  ?>
		document.addEventListener("DOMContentLoaded", function() {
			$("#datatable").DataTable({
				responsive: true,
				"lengthChange": false,
				"ordering": false,
				"sPaginationType": "listboxWithButtons",
				language: {
					search: ""
				},
				dom: '<"top"f>rt<"bottom"ip><"clear">',
				"ajax":{
					"url": "../config/perfil/mis_empleados.php",
					"type": "POST",
					"dataSrc": "",
					"data":{
						"rol": <?php echo $_SESSION["rol"]; ?>,
						"sessionid": <?php echo $_SESSION["id"]; ?>

					}
				},
				"initComplete": () => {
					$("#datatable").show();
				},
				"columns": 
				[
					{"data": "tipo_trabajador"},
					{"data": "nombre",},
					{"data": "usuario_id", visible: false, searchable: false},
					{"data": "expediente_id", searchable: false}
				],
				"columnDefs": 
				[
					{
						target: [0],
						render: function (data, type, row) {
							return(
								"<div class='text-left'>" +
									"<span>" + row["tipo_trabajador"] + "</span>" +
								"</div>"
							);
						}
					},
					{
						target: [1],
						render: function (data, type, row) {
							return(
								"<div class='text-left'>" +
									"<span>" + row["nombre"] + "</span>" +
								"</div>"
							);
						}
					},
					{
						target: [3],
						render: function (data, type, row) {
							return (
								"<div class='py-3 text-left'>" +
									"<div class='flex item-center md:justify-center'>" +
										"<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Verusuario'>" +
											"<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
												"<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
												"<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
											"</svg>"+
										"</div>" +
										"<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Verexpediente'>" +
											"<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
												"<path stroke-linecap='round' stroke-linejoin='round' stroke-width='1.2' d='M14,11C12.34,11 11,9.66 11,8V4H7C5.9,4 5,4.9 5,6V19C5,20.1 5.9,21 7,21H16C17.1,21 18,20.1 18,19V11H14M12,8C12,9.1 12.9,10 14,10H17.59L12,4.41V8M7,3H12L19,10V19C19,20.66 17.66,22 16,22H7C5.34,22 4,20.66 4,19V6C4,4.34 5.34,3 7,3Z'></path>"+
											"</svg>"+
										"</div>" +
										"<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Vervacaciones'>" +
											"<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
												"<path stroke-linecap='round' stroke-linejoin='round' stroke-width='1.2' d='M5,7H8V5L10,3H13L15,5V7H18C19.66,7 21,8.34 21,10V18C21,19.66 19.66,21 18,21H5C3.34,21 2,19.66 2,18V10C2,8.34 3.34,7 5,7M10.41,4L9,5.41V7H14V5.41L12.59,4H10.41M5,8C3.9,8 3,8.9 3,10V18C3,19.1 3.9,20 5,20H18C19.1,20 20,19.1 20,18V10C20,8.9 19.1,8 18,8H5Z' />"+
											"</svg>"+
										"</div>" +
									"</div>" +
								"</div>"
							);	
						}
					}
				]
			});

			const modalContainer = document.querySelector(
				"#modal-component-container"
			);

			const modal = document.querySelector("#modal-container");

			$('.modal-actions').on('click', '#close-modal', function(){
				closeModal();
			});

			function openModal(){
				showAndHide(modalContainer, ["block", "animate-fadeIn"], ["hidden", "animate-fadeOut"]);
				showAndHide(modal, ["animate-scaleIn"], ["animate-scaleOut"]);
			}

			function closeModal(){
				showAndHide(modalContainer, ["animate-fadeOut"], ["animate-fadeIn"]);
				showAndHide(modal, ["animate-scaleOut"], ["animate-scaleIn"]);
				setTimeout(() => {showAndHide(modalContainer, ["hidden"], ["block"]);}, 270);
			}

			function showAndHide(element, classesToAdd, classessToRemove){
				element.classList.remove( ...classessToRemove);
				element.classList.add( ...classesToAdd);
			}

			$(document).on('click', '.Vervacaciones', function () {
				var table = $('#datatable').DataTable();
				var rowSelector;
				var li = $(this).closest('li');
				if ( li.length ) {
					rowSelector = table.cell( li ).index().row;
				}
				else {
					rowSelector =  $(this).closest('tr');
				}
				var row = table.row(rowSelector);
				var data = row.data();
				$.ajax({
					type: "GET",
					url: "../config/getvacaciones.php",
					data:{
						"usuarioid": data["usuario_id"],
						"expedienteid": data["expediente_id"]
					},
					success: function (response) {
						var array = $.parseJSON(response);
						if(array[0] == "success"){
							$(".modal-content").html(
								'<h3 class="text-lg font-medium text-gray-900 mx-7 mt-5">'+data["nombre"]+'</h3>'+
								'<div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Vacaciones disponibles:'+
										'</div>'+
										'<span>'+array[1]+'</span>'+
									'</div>'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Vacaciones restantes:'+
										'</div>'+
										'<span>'+array[2]+'</span>'+
									'</div>'+
								'</div>'+
								'<div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Fecha de estatus'+
										'</div>'+
										'<span>'+array[3]+'</span>'+
									'</div>'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Fecha de vencimiento:'+
										'</div>'+
										'<span>'+array[4]+'</span>'+
									'</div>'+
								'</div>'+
								'<div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Número de solicitudes:'+
										'</div>'+
										'<span>'+array[5]+'</span>'+
									'</div>'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Solicitudes aprobadas:'+
										'</div>'+
										'<span>'+array[6]+'</span>'+
									'</div>'+
								'</div>'+
								'<div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Solicitudes rechazadas:'+
										'</div>'+
										'<span>'+array[7]+'</span>'+
									'</div>'+
									'<div class="flex-1 flex flex-col mt-5">'+
										'<div class="text-[#64748b] font-semibold">'+
											'Solicitudes canceladas:'+
										'</div>'+
										'<span>'+array[8]+'</span>'+
									'</div>'+
								'</div>');
						}else if(array[0] == "error"){
							$(".modal-content").html(
								'<h3 class="text-lg font-medium text-gray-900 mx-7 mt-5">'+data["nombre"]+'</h3>'+
								'<label class="mx-7">'+array[1]+'</label>');
						}
						openModal();	
					}
				});
			});
		});
	<?php } ?>

	$( document ).ready(function() {

		<?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){  ?>
			$('.dataTables_filter input[type="search"]').
        	attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');

			$(document).on('click', '.Verusuario', function () {
				var table = $('#datatable').DataTable();
				var rowSelector;
				var li = $(this).closest('li');
				if ( li.length ) {
					rowSelector = table.cell( li ).index().row;
				}
				else {
					rowSelector =  $(this).closest('tr');
				}
				var row = table.row(rowSelector);
				var data = row.data();
				window.location.href = "ver_usuario_perfil.php?idUser="+data['usuario_id']+"";
			});

			$(document).on('click', '.Verexpediente', function () {
				var table = $('#datatable').DataTable();
				var rowSelector;
				var li = $(this).closest('li');
				if ( li.length ) {
					rowSelector = table.cell( li ).index().row;
				}
				else {
					rowSelector =  $(this).closest('tr');
				}
				var row = table.row(rowSelector);
				var data = row.data();
				window.location.href = "ver_expediente_perfil.php?idExpediente="+data['expediente_id']+"";
			});
		<?php } ?>

		$("main").removeClass("overflow-y-auto").addClass("overflow-y-scroll");

		var originalState = $("#img_information").clone();

		$('#formPassword').data('old-state', $('#formPassword').html());

		<?php  if($profile->foto != null && $profile->nombre_foto != null){ ?>
			if (window.FileReader && window.Blob) {
				console.log('FileReader ó Blob es compatible con este navegador.');
				$('#svg').addClass("hidden");
				checkImage("../src/img/imgs_uploaded/<?php echo $profile->foto; ?>", function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/imgs_uploaded/<?php echo $profile->foto; ?>'); $('#archivo').text("<?php echo $profile->nombre_foto; ?>"); }, function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#archivo').text("No se encontró la imagen"); } );
			}else{
				console.error('FileReader ó Blob no es compatible con este navegador.');
				checkImage("../src/img/imgs_uploaded/<?php echo $profile->foto; ?>", function(){ $('#archivo').text("<?php echo $profile->nombre_foto; ?>"); }, function(){ $('#archivo').text("No se encontró la imagen"); } );
			}				
		<?php } ?>
	
		<?php if($profile -> nombre_foto != null && $profile -> foto != null){ ?>
			$("#div_actions_foto").removeClass("hidden");
		<?php } ?>
	
		$('#delete_foto').on('click', function() {
			$("#img_information").replaceWith(originalState.clone());
			$("#foto_perfil").val("");
			$("#div_actions_foto").addClass("hidden");
			delete_switch = "true";
		});

		formGeneral();

		if (!($("#correo").val().length == 0)){
			$("#correo").valid();
		}

		$("#reset_general").on("click", function () {
			var fd = new FormData();
			var sessionid = <?php echo $_SESSION["id"]; ?>;
			var validationapp = "resetformGeneral";
			fd.append('sessionid', sessionid);
			fd.append('validationapp', validationapp);
			$.ajax({
				type: "POST",
				url: "../ajax/perfil/resetformGeneral.php",
				data: fd,
				processData: false,
				contentType: false,
				success: function (response) {
					var array = $.parseJSON(response);
					var validator = $( "#formGeneral" ).validate();
					validator.resetForm();
					$('#error-container-general').html("");
					$("#nombre").val(array["nombre"]);
					$("#apellido_pat").val(array["apellido_pat"]);
					$("#apellido_mat").val(array["apellido_mat"]);
					$("#correo").val(array["correo"]);
					if (!($("#correo").val().length == 0)){
						$("#correo").removeData("previousValue");
						$("#correo").valid();
					}
					$("#div_actions_foto").addClass("hidden");
					$("#img_information").replaceWith(originalState.clone());
					$("#foto_perfil").val("");
					if(array["status"] == "not_found"){
						$('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg');
						$('#svg').addClass('hidden');
						$('#archivo').text("no se encontró la imagen");
						$("#div_actions_foto").removeClass("hidden");
					}else if(array["status"] == "found"){
						$('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/imgs_uploaded/'+array["identificador"]);
						$('#svg').addClass('hidden');
						$('#archivo').text(array["nombre_archivo"]);
						$("#div_actions_foto").removeClass("hidden");
					}
				}
			});
		});

		$(document).on("click", "#reset_password", function () {
			$('#formPassword').html($('#formPassword').data('old-state'));
		});

		<?php 
			if($switchExpedientes == "true"){ 
   				if($checkcurrentuserxexpediente  > 0){	
		?>

		let tabsContainer = document.querySelector("#menu");
		let tabTogglers = tabsContainer.querySelectorAll("button");

		$("#siguiente").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
                	tabTogglers[i].classList.add('menu-active');
                	continue;
                }
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});
		
		$("#siguiente2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});
		
		$("#anterior").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		$("#siguiente3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});
		
			
		$("#anterior2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		$("#anterior3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});
		
		<?php if($cont_referencias > 0){ ?>
			var number = <?php echo $cont_referencias; ?>;
			var container = document.getElementById("referencias");
			var json = '<?php echo $json; ?>';
			const myArr = JSON.parse(json);
			var j = 0;
			var divrow = document.createElement("div");
			divrow.classList.add('rounded-lg', 'border', 'border-gray-200');
			container.appendChild(divrow);
			for (i = 0; i < number; i++) {
				if(i == 0){
					var div = document.createElement("div");
					if(number > 1){
						div.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4', 'border-b', 'border-gray-200');
					}else{
						div.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4');
					}
					divrow.appendChild(div);
					var div2 = document.createElement("div");
					div2.classList.add('flex-1', 'flex', 'flex-col');
					div.appendChild(div2);
					var span = document.createElement("span");
					span.classList.add('text-[#64748b]', 'font-semibold');
					span.textContent = myArr[j];
					j++;
					div2.appendChild(span);
					var span2 = document.createElement("span");
					span2.textContent = myArr[j];
					j++;
					div2.appendChild(span2);
					var div3 = document.createElement("div");
					div3.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div.appendChild(div3);
					div3.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span3 = document.createElement("span");
					span3.textContent = myArr[j];
					j++;
					div3.appendChild(span3);
				}else if(i > 0 && i < number-1){
					var div4 = document.createElement("div");
					div4.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4', 'border-b', 'border-gray-200');
					divrow.appendChild(div4);
					var div5 = document.createElement("div");
					div5.classList.add('flex-1', 'flex', 'flex-col');
					div4.appendChild(div5);
					var span4 = document.createElement("span");
					span4.classList.add('text-[#64748b]', 'font-semibold');
					span4.textContent = myArr[j];
					j++;
					div5.appendChild(span4);
					var span5 = document.createElement("span");
					span5.textContent = myArr[j];
					j++;
					div5.appendChild(span5);
					var div6 = document.createElement("div");
					div6.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div4.appendChild(div6);
					div6.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span6 = document.createElement("span");
					span6.textContent = myArr[j];
					j++;
					div6.appendChild(span6);
				}else if(i == number-1){
					var div7 = document.createElement("div");
					div7.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4');
					divrow.appendChild(div7);
					var div8 = document.createElement("div");
					div8.classList.add('flex-1', 'flex', 'flex-col');
					div7.appendChild(div8);
					var span7 = document.createElement("span");
					span7.classList.add('text-[#64748b]', 'font-semibold');
					span7.textContent = myArr[j];
					j++;
					div8.appendChild(span7);
					var span8 = document.createElement("span");
					span8.textContent = myArr[j];
					j++;
					div8.appendChild(span8);
					var div9 = document.createElement("div");
					div9.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div7.appendChild(div9);
					div9.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span9 = document.createElement("span");
					span9.textContent = myArr[j];
					j++;
					div9.appendChild(span9);
				}
			}
		<?php }else{ ?>
			var container = document.getElementById("referencias");
			var div10 = document.createElement("div");
			div10.classList.add('rounded-lg', 'border', 'border-gray-200');
			container.appendChild(div10);
			var div11 = document.createElement("div");
			div11.classList.add('flex', 'flex-col', 'items-center', 'gap-3', 'p-4');
			div10.appendChild(div11);
			var span10 = document.createElement("span");
			span10.textContent = "No hay referencias laborales";
			div11.appendChild(span10);
		<?php } ?>

		<?php if($cont_datos > 0){ ?>
			var number2 = <?php echo $cont_datos; ?>;
			var container2 = document.getElementById("ref");
			var json2 = '<?php echo $json2; ?>';
			const miArr = JSON.parse(json2);
			var y = 0;
			var divrow2 = document.createElement("div");
			divrow2.classList.add('rounded-lg', 'border', 'border-gray-200');
			container2.appendChild(divrow2);
			for (a = 0; a < number2; a++) {
			var div12 = document.createElement("div");
			div12.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4');
			divrow2.appendChild(div12);
			var div13 = document.createElement("div");
			div13.classList.add('flex-1', 'flex', 'flex-col');
			div12.appendChild(div13);
			var span11 = document.createElement("span");
			span11.classList.add('text-[#64748b]', 'font-semibold');
			span11.textContent = miArr[y];
			div13.appendChild(span11);
			y++;
			var span12 = document.createElement("span");
			span12.textContent = miArr[y];
			div13.appendChild(span12);
			y++;
			var div14 = document.createElement("div");
			div14.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
			div12.appendChild(div14);
			span13 = document.createElement("span");
			span13.classList.add('text-[#64748b]', 'font-semibold');
			span13.textContent = "P. de derecho:";
			div14.appendChild(span13);
			span14 = document.createElement("span");
			span14.textContent = miArr[miArr.length-1];
			div14.appendChild(span14);
			if(a == 0){
					var div15 = document.createElement("div");
					if(number2 > 1){
						div15.classList.add('flex', 'flex-row', 'border-b', 'border-gray-200', 'gap-3', 'p-4');
					}else{
						div15.classList.add('flex', 'flex-row', 'gap-3', 'p-4');
					}
					divrow2.appendChild(div15);
					var div16 = document.createElement("div");
					div16.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-start', 'gap-3');
					div15.appendChild(div16);
					span15 = document.createElement("span");
					span15.classList.add('text-[#64748b]', 'font-semibold');
					span15.textContent = "RFC:";
					div16.appendChild(span15);
					span16 = document.createElement("span");
					span16.textContent = miArr[y];
					div16.appendChild(span16);
					y++;
					var div17 = document.createElement("div");
					div17.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div15.appendChild(div17);
					span17 = document.createElement("span");
					span17.classList.add('text-[#64748b]', 'font-semibold');
					span17.textContent = "CURP:";
					div17.appendChild(span17);
					span18 = document.createElement("span");
					span18.textContent = miArr[y];
					div17.appendChild(span18);
					y = y+2;
				}else if(a > 0 && a < number2-1){
					var div20 = document.createElement("div");
					div20.classList.add('flex', 'flex-row', 'border-b', 'border-gray-200', 'gap-3', 'p-4');
					divrow2.appendChild(div20);
					var div21 = document.createElement("div");
					div21.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-start', 'gap-3');
					div20.appendChild(div21);
					span20 = document.createElement("span");
					span20.classList.add('text-[#64748b]', 'font-semibold');
					span20.textContent = "RFC:";
					div21.appendChild(span20);
					span21 = document.createElement("span");
					span21.textContent = miArr[y];
					div21.appendChild(span21);
					y++;
					var div22 = document.createElement("div");
					div22.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div20.appendChild(div22);
					span22 = document.createElement("span");
					span22.classList.add('text-[#64748b]', 'font-semibold');
					span22.textContent = "CURP:";
					div22.appendChild(span22);
					span23 = document.createElement("span");
					span23.textContent = miArr[y];
					div22.appendChild(span23);
					y = y+2;
				}else if(a == number2-1){
					var div23 = document.createElement("div");
					div23.classList.add('flex', 'flex-row', 'gap-3', 'p-4');
					divrow2.appendChild(div23);
					var div24 = document.createElement("div");
					div24.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-start', 'gap-3');
					div23.appendChild(div24);
					span24 = document.createElement("span");
					span24.classList.add('text-[#64748b]', 'font-semibold');
					span24.textContent = "RFC:";
					div24.appendChild(span24);
					span25 = document.createElement("span");
					span25.textContent = miArr[y];
					div24.appendChild(span25);
					y++;
					var div25 = document.createElement("div");
					div25.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div23.appendChild(div25);
					span26 = document.createElement("span");
					span26.classList.add('text-[#64748b]', 'font-semibold');
					span26.textContent = "CURP:";
					div25.appendChild(span26);
					span27 = document.createElement("span");
					span27.textContent = miArr[y];
					div25.appendChild(span27);
					y = y+2;
				}
			}			   
		<?php }else{ ?>
			var container2 = document.getElementById("ref");
			var div18 = document.createElement("div");
			div18.classList.add('rounded-lg', 'border', 'border-gray-200');
			container2.appendChild(div18);
			var div19 = document.createElement("div");
			div19.classList.add('flex', 'flex-col', 'items-center', 'gap-3', 'p-4');
			div18.appendChild(div19);
			var span19 = document.createElement("span");
			span19.textContent = "No hay referencias bancarias";
			div19.appendChild(span19);
		<?php } ?>
		<?php 
				}
			}
		?>
	});

	function formGeneral(){
		$.validator.addMethod('names_validation', function (value) {
			return /^(?=.{1,40}$)[a-zA-Z\u00C0-\u00FF]+(?:[-'\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
		}, 'not a valid name.');

		$.validator.addMethod('email_verification', function (value) {
			return /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
		}, 'not a valid email.');

		$.validator.addMethod('filesize', function(value, element, param) {
			return this.optional(element) || (element.files[0].size <= param * 1048576)
		}, 'File size must be less than {0} MB');


		if ($('#formGeneral').length > 0) {
			$('#formGeneral').validate({
				ignore: [],
				onkeyup: false,
				errorPlacement: function(error, element) {
					if((element.attr('name') === 'foto_perfil')){
						error.appendTo("div#error");  
					}else{
						error.insertAfter(element.parent('.group.flex'));
					}
				},
				invalidHandler: function(e, validator){
					if(!($('#error-container-general').length)){
						this.$div = $('<div id="error-container-general" class="grid grid-cols-1 mt-5 mx-7"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-general" class="px-16 mb-4"></div></div></div></div>').insertBefore("#formGeneral");
					}
					$("#arrayerrors-general").html(""); 
					$.each(validator.errorMap, function( index, value ) { 
						this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
						$("#arrayerrors-general").append(this.$arrayerror);
					});
				},
				highlight: function(element) {
					var elem = $(element);
					$(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
					$(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
				},
				unhighlight: function(element) {
					var elem = $(element);	
					$(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
					$(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
				},
				rules: {
					nombre: {
						required: true,
						names_validation: true
					},
					apellido_pat: {
						required: true,
						names_validation: true
					},
					apellido_mat: {
						required: true,
						names_validation: true
					},
					correo: {
						required: true,
						email_verification: true,
						remote: {
							url: "../ajax/validacion/perfil/checkemail.php",
							type: "POST",
							data: {
								"sessionid": "<?php echo $_SESSION["id"]; ?>"
							},
							beforeSend: function () {
								$('#myloader').removeClass('hidden');
								$('#correct-email').addClass('hidden');
							},
							complete: function(data){
								if(data.responseText == "true") {
									$('#myloader').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
									$('#correct-email').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
								}else{
									$('#myloader').addClass('hidden');
									$('#correct-email').addClass('hidden');
								}
							}
						}
					},
					foto_perfil: {
						extension: "jpg|jpeg|png",
						filesize: 10
					}
				},
				messages: {
					nombre: {
						required: 'Por favor, ingrese un nombre',
						names_validation: 'Nombre no válido'
					},
					apellido_pat: {
						required: 'Por favor, ingrese un apellido paterno',
						names_validation: 'Apellido paterno no válido'
					},
					apellido_mat: {
						required: 'Por favor, ingrese un apellido materno',
						names_validation: 'Apellido materno no válido'
					},
					correo: {
						required:function () {$('#myloader').addClass('hidden'); $('#correct-email').addClass('hidden'); $("#correo").removeData("previousValue"); return "Por favor, ingrese un correo electrónico"; },
						email_verification:function () {$('#myloader').addClass('hidden'); $('#correct-email').addClass('hidden'); $("#correo").removeData("previousValue"); return "Asegúrese que el texto ingresado este en formato de email"; }
					},
					foto_perfil: {
						extension: 'Solo se permite jpg, jpeg y pngs',
						filesize: 'Las imágenes deben pesar ser menos de 10 MB'
					}
				},
				submitHandler: function(form) {
					$('#submit-button').html(
					'<button disabled id="guardar_general" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700" type="submit">'+
						'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
						'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
						'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
						'</svg>'+
						'Cargando...'+
					'</button>');
					$('#error-container-general').html("");
					check_user_logged().then((response) => {
						if(response == "true"){
							window.addEventListener('beforeunload', unloadHandler);
							var fd = new FormData();
							var nombre = $("input[name=nombre]").val();
							var apellido_pat = $("input[name=apellido_pat]").val();
							var apellido_mat = $("input[name=apellido_mat]").val();
							var correo = $("input[name=correo]").val();
							var foto_perfil = $('#foto_perfil')[0].files[0];
							var app = "perfil_general";
							fd.append('nombre', nombre);
							fd.append('apellido_pat', apellido_pat);
							fd.append('apellido_mat', apellido_mat);
							fd.append('correo', correo);
							fd.append('foto_perfil', foto_perfil);
							fd.append('delete', delete_switch);
							fd.append('app', app);
							$.ajax({
								url: '../ajax/class_search.php',
								type: 'POST',
								data: fd,
								processData: false,
								contentType: false,
								success: function(data) {
									setTimeout(function(){
										var array = $.parseJSON(data);
										if (array[0] == "success") {
											Swal.fire({
												title: "Información general editada",
												text: array[1],
												icon: "success"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_general' type='submit'>Guardar</button>");
												$("#foto_perfil").val("");
												var getSrc = $('#preview').attr('src');
												$("#photo-perfil").removeAttr('src');
												$("#navbar-photo").removeAttr('src');
												if(getSrc == null){
													$("#photo-perfil").attr('src', '../src/img/default-user.png');
													$("#navbar-photo").attr('src', '../src/img/default-user.png');
												}else{
													$("#photo-perfil").attr('src', getSrc);
													$("#navbar-photo").attr('src', getSrc);
												}
												$('#profile-name').html(nombre+ " " +apellido_pat+ " " +apellido_mat);
											});
										} else if(array[0] == "error") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_general' type='submit'>Guardar</button>");
											});
										}	
									},3000);
								},
								error: function(data) {
									$("#ajax-error").text('Fail to send request');
								}
							});
						}else{
							Swal.fire({
								title: "Ocurrió un error",
								text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
								icon: "error"
							}).then(function() {
								$('#submit-button').html("<button disabled id='guardar_general' class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' type='submit'>Guardar</button>");
								window.location.href = "login.php";
							});
						}
					}).catch((error) => {
						console.log(error)
					});
				return false;
				}
			});
		}
	}

	function formPassword(){
		$.validator.addMethod('password_validation', function (value) {
			return /^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+)?$/.test(value);
		}, 'at least one uppercase, one lowercase, one number and one symbol.');

		if ($('#formPassword').length > 0) {
			$('#formPassword').validate({
				ignore: [],
				onkeyup: false,
				errorPlacement: function(error, element) {
					error.insertAfter(element.parent('.group.flex'));
				},
				invalidHandler: function(e, validator){
					if(!($('#error-container-password').length)){
						this.$div = $('<div id="error-container-password" class="grid grid-cols-1 mt-5 mx-7"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-password" class="px-16 mb-4"></div></div></div></div>').insertBefore("#formPassword");
					}
					$("#arrayerrors-password").html(""); 
					$.each(validator.errorMap, function( index, value ) { 
						this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
						$("#arrayerrors-password").append(this.$arrayerror);
					});
				},
				highlight: function(element) {
					var elem = $(element);
					$(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
					$(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
				},
				unhighlight: function(element) {
					var elem = $(element);	
					$(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
					$(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
				},
				rules: {
					new_password: {
						required: true,
						minlength: 8,
						password_validation: true,
						remote: {
							url: "../ajax/validacion/perfil/checkpassword.php",
							type: "post",
							data: {
								"sessionid": "<?php echo $_SESSION["id"]; ?>"
							},
							beforeSend: function () {
								$('#loader-password').removeClass('hidden');
								$('#correct-password').addClass('hidden');
							},
							complete: function(data){
								if(data.responseText == "true") {
									$('#loader-password').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
									$('#correct-password').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
								}else{
									$('#loader-password').addClass('hidden');
									$('#correct-password').addClass('hidden');
								}
							}
						}
					},
					confirm_password: {
						required: true,
						minlength: 8,
						equalTo: "input[name=\"new_password\"]"
					},
					current_password: {
						required: true
					}
				},
				messages: {
					new_password: {
						required:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#new_password").removeData("previousValue"); return "Por favor, ingresa una contraseña"; },
							minlength:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#new_password").removeData("previousValue"); return "La contraseña debe de contener 8 caracteres como mínimo"; },
							password_validation:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#new_password").removeData("previousValue"); return "Contraseña no válida"; }
					},
					confirm_password: {
						required: 'Por favor, confirme su contraseña',
						minlength: "La confirmación de la contraseña debe de tener como mínimo 8 caracteres",
						equalTo: 'Las contraseñas no coinciden'
					},
					current_password: {
						required: "Por favor, ingrese la contraseña actual"
					}
				},
				submitHandler: function(form) {
					$('#button-submit').html(
					'<button disabled id="guardar_password" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700" type="submit">'+
						'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
						'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
						'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
						'</svg>'+
						'Cargando...'+
					'</button>');
					$('#error-container-password').html("");
					check_user_logged().then((response) => {
						if(response == "true"){
							window.addEventListener('beforeunload', unloadHandler);
							var fd = new FormData();
							var password = $("input[name=new_password]").val();
							var password_confirm = $("input[name=confirm_password]").val();
							var current_password = $("input[name=current_password]").val();
							var app = "perfil_password"
							fd.append('password', password);
							fd.append('password_confirm', password_confirm);
							fd.append('current_password', current_password);
							fd.append('app', app);
							$.ajax({
								url: '../ajax/class_search.php',
								type: 'POST',
								data: fd,
								processData: false,
								contentType: false,
								success: function(data) {
									setTimeout(function(){
										var array = $.parseJSON(data);
										if (array[0] == "success") {
											Swal.fire({
												title: "Password editado",
												text: array[1],
												icon: "success"
											}).then(function() {
												window.removeEventListener("beforeunload", unloadHandler);
												$("#button-submit").html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_password' type='submit'>Guardar</button>");
												$("#formPassword")[0].reset();
												$("#loader-password").addClass("hidden");
												$("#correct-password").addClass("hidden");
											});
										} else if(array[0] == "error") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener("beforeunload", unloadHandler);
												$("#button-submit").html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_password' type='submit'>Guardar</button>");
											});
										}		
									},3000);
								},
								error: function(data) {
									$("#ajax-error").text('Fail to send request');
								}
							});
						}else{
							Swal.fire({
								title: "Ocurrió un error",
								text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
								icon: "error"
							}).then(function() {
								$('#button-submit').html("<button disabled id='guardar_password' class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' type='submit'>Guardar</button>");
								window.location.href = "login.php";
							});
						}
					}).catch((error) => {
						console.log(error)
					});
				return false;
				}
			});
		}
	}

	function resetFormValidator(formId) {
		$(formId).removeData('validator');
		$(formId).removeData('unobtrusiveValidation');
		$.validator.unobtrusive.parse(formId);
	}

	$('form#formGeneral input[type="text"]').on('keypress', function(e) {
		return e.which !== 13;
	});

	$('form#formPassword input[type="password"]').on('keypress', function(e) {
		return e.which !== 13;
	});

	function checkImage(imageSrc, good, bad) {
		var img = new Image();
		img.onload = good; 
		img.onerror = bad;
		img.src = imageSrc;
	}

	$('input[name="foto_perfil"]').change(function() {
		if (window.FileReader && window.Blob) {
			var files = $('input#foto_perfil').get(0).files;
			if (files.length > 0) {
				var file = files[0];
				console.log('Archivo cargado: ' + file.name);
				console.log('Blob mime: ' + file.type);
				console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
				console.log('Tamaño en bytes: ' + file.size);

				var fileReader = new FileReader();
				fileReader.onerror = function (e) {
					console.error('ERROR', e);
				};
				fileReader.onloadend = function (e) {
					var arr = new Uint8Array(e.target.result);
					var header = '';
					for (var i = 0; i < arr.length; i++) {
						header += arr[i].toString(16);
					}
					console.log('Encabezado: ' + header);

					// Check the file signature against known types
					var type = 'unknown';
					switch (header) {
						case '89504e47':
							type = 'image/png';
							break;
						case 'ffd8ffe0':
						case 'ffd8ffe1':
						case 'ffd8ffe2':
							type = 'image/jpeg';
							break;
					}
					if (file.type !== type) {
						console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
						$('#preview').addClass('hidden');
						$('#svg').removeClass('hidden');
						$('#archivo').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
						$("#div_actions_foto").removeClass("hidden");
					} else {
						console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
						if(file.size > 10485760){
							$('#preview').addClass('hidden');
							$('#svg').removeClass('hidden');
							$('#archivo').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
							$("#div_actions_foto").removeClass("hidden");
						}else{
							$('#preview').removeClass('hidden');
							$('#preview').addClass('w-10 h-10');
							$('#svg').addClass('hidden');
							$('#archivo').text(file.name);
							$("#div_actions_foto").removeClass("hidden");
							delete_switch="false";
							let reader = new FileReader();
							reader.onload = function (event) {
								$('#preview').attr('src', event.target.result);
							}
							reader.readAsDataURL(file);
						}
					}
				};
				fileReader.readAsArrayBuffer(file.slice(0, 4));
			}
		} else {
			console.error('FileReader ó Blob no es compatible con este navegador.');
			if($("#foto_perfil").val() != ''){
				var file = this.files[0].name;
				var lastDot = file.lastIndexOf('.');
				var extension = file.substring(lastDot + 1);
				if(extension == "jpeg" || extension == "jpg" || extension == "png") {
					if(this.files[0].size > 10485760){
						$('#archivo').text("El archivo " +file+ " debe pesar menos 10 MB.");
						$("#div_actions_foto").removeClass("hidden");
					}else{
						$('#archivo').text(file);
						$("#div_actions_foto").removeClass("hidden");
						delete_switch="false";
					}
				}else{
					$('#archivo').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
					$("#div_actions_foto").removeClass("hidden");
				}
			}
		}
	});

	function check_user_logged(){
		return new Promise((resolve, reject) => {
			$.ajax({
				type: "POST",
				url: "../ajax/check_user_logged.php",
				data:{
					pagina: <?php echo "\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\"";?>
				},
				success: function (response) {
					resolve(response)
				},
				error: function (error) {
					reject(error)
				}
			});
		})
	}

	function unloadHandler(e) {
		// Cancel the event
		e.preventDefault();
		// Chrome requires returnValue to be set
		e.returnValue = '';
	}
</script>
<style>
	.error{
		color: rgb(250 30 45);
	}

	<?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){  ?>
		.dataTables_wrapper .dataTables_filter {
			float: left;
			text-align: left;
			padding-bottom: 5px;
			padding-top: 13px;
		}

		@media (max-width: 640px) {
			.dataTables_filter {
				width: 100%;
			}
		}

		.dataTables_paginate {
			font-size: 12px;
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
			right: 7px;
		}

		.dt-buttons {
			float: right !important;
			text-align: right;
		}

		#datatable {
			border-collapse: collapse !important;
		}

		.search {
			margin: auto !important;
			height: 40px !important;
		}

		tr.odd:hover,
		tr.even:hover {
			background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
		}

		tr.odd {
			border-bottom-width: 1px;
			border-color: rgb(229 231 235 / var(--tw-border-opacity));
			--tw-border-opacity: 1;
			background: transparent !important;
		}

		tr.even {
			border-bottom-width: 1px;
			border-color: rgb(229 231 235 / var(--tw-border-opacity));
			--tw-border-opacity: 1;
			background: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
		}

		div.dataTables_filter .search {
			background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
			background-repeat: no-repeat;
			background-color: #fff;
			background-position: 3px 7px !important;
			padding-left: 30px;
		}

		table{
			margin: 0 auto;
			width: 100%;
			clear: both;
			border-collapse: collapse;
			table-layout: fixed;
			word-wrap:break-word;
		}
	<?php } ?>

    		.btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
    </style>