<script>
    const tabElements = [{
            id: 'vision',
            triggerEl: document.querySelector('#vision-tab-profile'),
            targetEl: document.querySelector('#vision')
        },
        {
            id: 'noticias',
            triggerEl: document.querySelector('#noticias-tab-profile'),
            targetEl: document.querySelector('#noticias')
        },
        {
            id: 'buzon',
            triggerEl: document.querySelector('#buzon-tab-profile'),
            targetEl: document.querySelector('#buzon')
        },
        {
            id: 'avisos',
            triggerEl: document.querySelector('#avisos-tab-profile'),
            targetEl: document.querySelector('#avisos')
        },
        {
            id: 'bolsa',
            triggerEl: document.querySelector('#bolsa-tab-profile'),
            targetEl: document.querySelector('#bolsa')
        }
    ];

    tabElements.forEach((tab) => {
        tab.triggerEl.addEventListener('click', () => {
            target = tab;
            svg = tab.triggerEl.firstChild;

            tabElements.forEach((t) => {
                t.targetEl.classList.remove("block")
                t.targetEl.classList.add("hidden");
                t.triggerEl.classList.remove("text-blue-600", "border-blue-600", "active",
                    "border-b-2");
                t.triggerEl.firstChild.classList.remove("text-blue-600");
                t.triggerEl.classList.add("border-transparent", "border-b-2",
                    "hover:text-gray-600", "hover:border-gray-300");
                t.triggerEl.firstChild.classList.add("text-gray-400",
                    "group-hover:text-gray-500");
            })
            target.targetEl.classList.remove("hidden");
            target.targetEl.classList.add("block");
            target.triggerEl.classList.add("text-blue-600", "border-blue-600", "active", "border-b-2");
            target.triggerEl.classList.remove("border-transparent", "hover:text-gray-600",
                "hover:border-gray-300");
            target.triggerEl.firstChild.classList.remove("text-gray-400", "group-hover:text-gray-500");
            svg.classList.add("text-blue-600");
        })
    })
</script>