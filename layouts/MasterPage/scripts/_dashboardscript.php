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

            tabElements.forEach((t) => {
                t.targetEl.classList.remove("block")
                t.targetEl.classList.add("hidden");
                t.triggerEl.classList.remove("bg-[#4f46e5]", "text-white", "menu-active");
                t.triggerEl.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
                "focus:bg-slate-100", "focus:text-slate-800");
                t.triggerEl.firstElementChild.classList.add("text-slate-400", "transition-colors", 
                "group-hover:text-slate-500", "group-focus:text-slate-500");
            })
            target.targetEl.classList.remove("hidden");
            target.targetEl.classList.add("block");
            target.triggerEl.classList.add("bg-[#4f46e5]", "text-white", "menu-active");
            target.triggerEl.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
            "focus:bg-slate-100", "focus:text-slate-800");
            target.triggerEl.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
            "group-hover:text-slate-500", "group-focus:text-slate-500");
        })
    });
</script>