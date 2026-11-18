const motion = window.matchMedia('(prefers-reduced-motion: reduce)');

const filters = document.querySelector('.archive-filters');
if (filters) {
    const links = [...filters.querySelectorAll('[data-filter]')];
    const cards = [...document.querySelectorAll('[data-project-category]')];
    const status = document.querySelector('#archive-status');

    function showCategory(category, animate) {
        links.forEach((link) => {
            if (link.dataset.filter === category) {
                link.setAttribute('aria-current', 'page');
            } else {
                link.removeAttribute('aria-current');
            }
        });

        let visible = 0;
        cards.forEach((card) => {
            card.hidden = category !== 'all' && card.dataset.projectCategory !== category;
            if (!card.hidden) {
                visible++;
                if (animate && !motion.matches) {
                    card.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 300, easing: 'ease-out' });
                }
            }
        });
        status.textContent = `${visible} ${visible === 1 ? 'project' : 'projects'} shown`;
    }

    filters.addEventListener('click', (event) => {
        const link = event.target.closest('[data-filter]');
        if (!link || event.defaultPrevented || event.button !== 0 ||
            event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;

        event.preventDefault();
        if (link.getAttribute('aria-current') === 'page') return;
        history.pushState(null, '', link.href);
        showCategory(link.dataset.filter, true);
    });

    window.addEventListener('popstate', () => {
        const category = new URLSearchParams(location.search).get('category');
        const link = links.find((item) => item.dataset.filter === category);
        showCategory(link?.dataset.filter ?? 'all', false);
    });
}

const menu = document.querySelector('.mobile-menu');
document.addEventListener('click', (event) => {
    if (menu.open && !menu.contains(event.target)) menu.open = false;
});
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && menu.open) {
        menu.open = false;
        menu.querySelector('summary').focus();
    }
});

const viewer = document.querySelector('#photo-viewer');
if (viewer && typeof viewer.showModal === 'function') {
    const photos = [...document.querySelectorAll('.football-gallery figure > a')];
    const image = viewer.querySelector('img');
    const caption = viewer.querySelector('figcaption');
    const previous = viewer.querySelector('[data-photo-step="-1"]');
    const next = viewer.querySelector('[data-photo-step="1"]');
    let index = 0;

    function showPhoto(position) {
        index = (position + photos.length) % photos.length;
        const photo = photos[index];
        image.src = photo.href;
        image.alt = photo.querySelector('img').alt;
        caption.textContent = photo.parentElement.querySelector('figcaption').textContent;
    }

    photos.forEach((photo, position) => {
        photo.setAttribute('aria-haspopup', 'dialog');
        photo.addEventListener('click', (event) => {
            if (event.defaultPrevented || event.button !== 0 ||
                event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
            event.preventDefault();
            showPhoto(position);
            viewer.showModal();
        });
    });

    previous.hidden = next.hidden = photos.length < 2;
    previous.addEventListener('click', () => showPhoto(index - 1));
    next.addEventListener('click', () => showPhoto(index + 1));
    viewer.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            event.preventDefault();
            showPhoto(index + (event.key === 'ArrowLeft' ? -1 : 1));
        }
    });
    viewer.addEventListener('click', (event) => {
        if (event.target === viewer) viewer.close();
    });
}
