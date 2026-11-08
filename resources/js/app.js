const nav = document.querySelector('[data-nav]');

if (nav) {
    const toggle = nav.querySelector('[data-nav-toggle]');
    const panel = nav.querySelector('[data-nav-panel]');
    const iconOpen = nav.querySelector('[data-icon-open]');
    const iconClose = nav.querySelector('[data-icon-close]');

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? toggle.dataset.labelClose : toggle.dataset.labelOpen);
        panel.classList.toggle('hidden', !open);
        iconOpen.classList.toggle('hidden', open);
        iconClose.classList.toggle('hidden', !open);
    };

    toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setOpen(false);
            toggle.focus();
        }
    });

    window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
        if (event.matches) {
            setOpen(false);
        }
    });
}

const dropdowns = document.querySelectorAll('[data-dropdown]');

dropdowns.forEach((dropdown) => {
    dropdown.addEventListener('toggle', () => {
        if (dropdown.open) {
            dropdowns.forEach((other) => other !== dropdown && other.removeAttribute('open'));
        }
    });
});

document.addEventListener('click', (event) => {
    dropdowns.forEach((dropdown) => {
        if (dropdown.open && !dropdown.contains(event.target)) {
            dropdown.removeAttribute('open');
        }
    });
});

document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
        return;
    }

    dropdowns.forEach((dropdown) => {
        if (dropdown.open) {
            dropdown.removeAttribute('open');
            dropdown.querySelector('summary').focus();
        }
    });
});
