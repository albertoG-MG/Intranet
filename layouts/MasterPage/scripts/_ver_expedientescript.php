<script>
$(document).ready(function () {

    let tabsContainer = document.querySelector("#tabs");
    let tabTogglers = tabsContainer.querySelectorAll("a");
    console.log(tabTogglers);

    tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {

            tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
            tabTogglers[i].classList.remove('active');
            if ("#" + tabContents.children[i].id === tabName) {
                tabTogglers[i].className="active";
                continue;
            }
            tabContents.children[i].classList.add("hidden");

            }
            e.target.parentElement.classList.add("border-blue-400", "opacity-100");
        });
    });

    document.getElementById("default-tab").click();

    $("#siguiente").on("click", function () {
        let tabContents = document.querySelector("#tab-contents");
        let currentTab = document.querySelector(".active");
        let tabName = currentTab.parentElement.nextElementSibling.firstChild.getAttribute("href");
        for (let i = 0; i < tabContents.children.length; i++) {
                tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                tabTogglers[i].classList.remove('active');
                if ("#" + tabContents.children[i].id === tabName) {
                tabTogglers[i].className="active";
                continue;
                }
                tabContents.children[i].classList.add("hidden");
        }
        currentTab.parentElement.nextElementSibling.classList.add("border-blue-400", "opacity-100");
    });

    $("#siguiente2").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.nextElementSibling.firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.nextElementSibling.classList.add("border-blue-400", "opacity-100");
        });
		
		$("#anterior").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[0].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[0].classList.add("border-blue-400", "opacity-100");
        });

        $("#anterior2").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[1].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[1].classList.add("border-blue-400", "opacity-100");
        });
		
		$("#siguiente3").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.nextElementSibling.firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.nextElementSibling.classList.add("border-blue-400", "opacity-100");
        });

        $("#anterior3").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[2].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[2].classList.add("border-blue-400", "opacity-100");
        });

    <?php if($cont_referencias > 0){ ?>
            var number = <?php echo $cont_referencias; ?>;
            var container = document.getElementById("referencias");
            var json = '<?php echo $json; ?>';
            const myArr = JSON.parse(json);
            var j = 0;
            for (i = 0; i < number; i++) {
                var divrow = document.createElement("div");
                divrow.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-3', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
                container.appendChild(divrow);
                var div = document.createElement("div");
                div.classList.add('grid', 'grid-cols-1');
                divrow.appendChild(div);
                var div2 = document.createElement("div");
                div2.classList.add('grid', 'grid-cols-1');
                divrow.appendChild(div2);
                var div3 = document.createElement("div");
                div3.classList.add('grid', 'grid-cols-1');
                divrow.appendChild(div3);     
                div.appendChild(document.createTextNode("Nombre completo" + (i + 1) + ""));
                var span = document.createElement("span");
                span.textContent = myArr[j];
                j++;
                div.appendChild(span);
                div2.appendChild(document.createTextNode("Parentesco " + (i + 1) + ""));
                var span2 = document.createElement("span");
                span2.textContent = myArr[j];
                j++;
                div2.appendChild(span2);
                div3.appendChild(document.createTextNode("Teléfono " + (i + 1) + ""));
                var span3 = document.createElement("span");
                span3.textContent = myArr[j];
                j++;
                div3.appendChild(span3);
            }
                var div4 = document.createElement("div");
                div4.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'border-b-2', 'border-gray-200', 'mt-5', 'mx-7');
                container.appendChild(div4);
        <?php }else{ ?>
            var container = document.getElementById("referencias");
            var div = document.createElement("div");
            div.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'border-b-2', 'border-gray-200', 'mt-5', 'b-5', 'mx-7');
            container.appendChild(div);
            div.appendChild(document.createTextNode("No hay datos registrados"));
        <?php } ?>

        <?php if($cont_datos > 0){ ?>
            var number = <?php echo $cont_datos; ?>;
            var container = document.getElementById("ref");
            var json2 = '<?php echo $json2; ?>';
            const miArr = JSON.parse(json2);
            var y = 0;
            for (i = 0; i < number; i++) {
               var div4 = document.createElement("div");
               div4.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
               container.appendChild(div4);	   
               var div = document.createElement("div");
               div.classList.add('grid', 'grid-cols-1');
               div4.appendChild(div);
               var div2 = document.createElement("div");
               div2.classList.add('grid', 'grid-cols-1');
               div4.appendChild(div2);
               var div3 = document.createElement("div");
               div3.classList.add('grid', 'grid-cols-1');
               div4.appendChild(div3);
			   var divr1 = document.createElement("div");
               divr1.classList.add('grid', 'grid-cols-1');
               div4.appendChild(divr1);  
               var divr2 = document.createElement("div");
               divr2.classList.add('grid', 'grid-cols-1', 'col-span-1', 'md:col-span-2');
               div4.appendChild(divr2);
               div.appendChild(document.createTextNode("Nombre completo" + (i + 1) + ""));
               var span = document.createElement("span");
               span.textContent = miArr[y];
               y++;
               div.appendChild(span);
               div2.appendChild(document.createTextNode("Parentesco " + (i + 1) + ""));	   
               var span2 = document.createElement("span");
               span2.textContent = miArr[y];
               y++;
               div2.appendChild(span2);
               div3.appendChild(document.createTextNode("RFC " + (i + 1) + ""));	   
               var span3 = document.createElement("span");
               span3.textContent = miArr[y];
               y++;
               div3.appendChild(span3);   
               divr1.appendChild(document.createTextNode("CURP " + (i + 1) + ""));
               var span4 = document.createElement("span");
               span4.textContent = miArr[y];
               y++;
               divr1.appendChild(span4);
               divr2.appendChild(document.createTextNode("Porcentaje de derecho " + (i + 1) + ""));   
               var span5 = document.createElement("span");
               span5.textContent = miArr[y];
               y++;
               divr2.appendChild(span5);
            }
			var divr3 = document.createElement("div");
            divr3.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'border-b-2', 'border-gray-200', 'mt-5', 'mx-7');
            container.appendChild(divr3);
         <?php }else{ ?>
			var container = document.getElementById("ref");
            var div = document.createElement("div");
            div.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'border-b-2', 'border-gray-200', 'mt-5', 'b-5', 'mx-7');
            container.appendChild(div);
            div.appendChild(document.createTextNode("No hay datos registrados"));
		 <?php } ?>

    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_expediente.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
});
</script>