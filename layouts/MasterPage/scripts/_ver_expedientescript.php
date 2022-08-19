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

    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_expediente.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
});
</script>