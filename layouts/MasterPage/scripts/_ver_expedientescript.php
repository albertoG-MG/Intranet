<script>
	//MENU
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
				trigger.triggerMenu.classList.remove("bg-[#4f46e5]", "text-white", "menu-active");
				trigger.triggerMenu.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
				"focus:bg-slate-100", "focus:text-slate-800");
				trigger.triggerMenu.firstElementChild.classList.add("text-slate-400", "transition-colors", 
				"group-hover:text-slate-500", "group-focus:text-slate-500");
			})
			objective.targetMenu.classList.remove("hidden");
			objective.targetMenu.classList.add("block");
			objective.triggerMenu.classList.add("bg-[#4f46e5]", "text-white", "menu-active");
			objective.triggerMenu.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
			"focus:bg-slate-100", "focus:text-slate-800");
			objective.triggerMenu.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
			"group-hover:text-slate-500", "group-focus:text-slate-500");
		})
	});

	$( document ).ready(function() {
		//PARA NAVEGAR ENTRE TABS CON LOS BOTONES
		let tabsContainer = document.querySelector("#menu");
		let tabTogglers = tabsContainer.querySelectorAll("button");

		$("#siguiente").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

		$("#anterior").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		$("#siguiente2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

		$("#anterior2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		$("#siguiente3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

		//REFERENCIAS LABORALES
		<?php if(count($array_reflaborales) > 0){ ?>
			var number = <?php echo count($array_reflaborales); ?>;
			var container = document.getElementById("referencias");
			var json = '<?php echo $reflaborales_json; ?>';
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
					span.textContent = myArr[j]["nombre"];
					div2.appendChild(span);
					var span2 = document.createElement("span");
					span2.textContent = myArr[j]["relacion"];
					div2.appendChild(span2);
					var div3 = document.createElement("div");
					div3.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div.appendChild(div3);
					div3.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span3 = document.createElement("span");
					span3.textContent = myArr[j]["telefono"];
					div3.appendChild(span3);
					j++;
				}else if(i > 0 && i < number-1){
					var div4 = document.createElement("div");
					div4.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4', 'border-b', 'border-gray-200');
					divrow.appendChild(div4);
					var div5 = document.createElement("div");
					div5.classList.add('flex-1', 'flex', 'flex-col');
					div4.appendChild(div5);
					var span4 = document.createElement("span");
					span4.classList.add('text-[#64748b]', 'font-semibold');
					span4.textContent = myArr[j]["nombre"];
					div5.appendChild(span4);
					var span5 = document.createElement("span");
					span5.textContent = myArr[j]["relacion"];
					div5.appendChild(span5);
					var div6 = document.createElement("div");
					div6.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div4.appendChild(div6);
					div6.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span6 = document.createElement("span");
					span6.textContent = myArr[j]["telefono"];
					div6.appendChild(span6);
					j++;
				}else if(i == number-1){
					var div7 = document.createElement("div");
					div7.classList.add('flex', 'flex-col', 'md:flex-row', 'md:items-center', 'justify-between', 'gap-3', 'p-4');
					divrow.appendChild(div7);
					var div8 = document.createElement("div");
					div8.classList.add('flex-1', 'flex', 'flex-col');
					div7.appendChild(div8);
					var span7 = document.createElement("span");
					span7.classList.add('text-[#64748b]', 'font-semibold');
					span7.textContent = myArr[j]["nombre"];
					div8.appendChild(span7);
					var span8 = document.createElement("span");
					span8.textContent = myArr[j]["relacion"];
					div8.appendChild(span8);
					var div9 = document.createElement("div");
					div9.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
					div7.appendChild(div9);
					div9.innerHTML = '<svg class="h-5 w-5 hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>';
					var span9 = document.createElement("span");
					span9.textContent = myArr[j]["telefono"];
					div9.appendChild(span9);
					j++;
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

		//REFERENCIAS BANCARIAS
		<?php if(count($array_refban) > 0){ ?>
			var number2 = <?php echo count($array_refban); ?>;
			var container2 = document.getElementById("ref");
			var json2 = '<?php echo $refban_json; ?>';
			const miArr = JSON.parse(json2);
			console.log(miArr);
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
				span11.textContent = miArr[y]["nombre"];
				div13.appendChild(span11);
				var span12 = document.createElement("span");
				span12.textContent = miArr[y]["relacion"];
				div13.appendChild(span12);
				var div14 = document.createElement("div");
				div14.classList.add('flex-1', 'md:flex', 'md:justify-end', 'md:items-center', 'md:gap-3');
				div12.appendChild(div14);
				span13 = document.createElement("span");
				span13.classList.add('text-[#64748b]', 'font-semibold');
				span13.textContent = "P. de derecho:";
				div14.appendChild(span13);
				span14 = document.createElement("span");
				span14.textContent = miArr[y]["prcnt_derecho"];
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
					span16.textContent = miArr[y]["rfc"];
					div16.appendChild(span16);
					var div17 = document.createElement("div");
					div17.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div15.appendChild(div17);
					span17 = document.createElement("span");
					span17.classList.add('text-[#64748b]', 'font-semibold');
					span17.textContent = "CURP:";
					div17.appendChild(span17);
					span18 = document.createElement("span");
					span18.textContent = miArr[y]["curp"];
					div17.appendChild(span18);
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
					span21.textContent = miArr[y]["rfc"];
					div21.appendChild(span21);
					var div22 = document.createElement("div");
					div22.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div20.appendChild(div22);
					span22 = document.createElement("span");
					span22.classList.add('text-[#64748b]', 'font-semibold');
					span22.textContent = "CURP:";
					div22.appendChild(span22);
					span23 = document.createElement("span");
					span23.textContent = miArr[y]["curp"];
					div22.appendChild(span23);
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
					span25.textContent = miArr[y]["rfc"];
					div24.appendChild(span25);
					var div25 = document.createElement("div");
					div25.classList.add('flex-1', 'flex', 'flex-col', 'md:flex-row', 'md:flex-wrap', 'md:justify-end', 'gap-3');
					div23.appendChild(div25);
					span26 = document.createElement("span");
					span26.classList.add('text-[#64748b]', 'font-semibold');
					span26.textContent = "CURP:";
					div25.appendChild(span26);
					span27 = document.createElement("span");
					span27.textContent = miArr[y]["curp"];
					div25.appendChild(span27);
				}
				y++;
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
	});

</script>