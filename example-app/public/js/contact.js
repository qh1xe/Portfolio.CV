(() => {
    const section = document.getElementById('contact-form');
    const trigger = document.getElementById('contact-form-trigger');
    document.getElementById('contact-form-close').addEventListener('click', () => {
        section.hidden = true;
        trigger.setAttribute('aria-expanded', 'false');
        if (window.location.hash === '#contact-form') {
            history.replaceState(null, '', window.location.pathname + window.location.search);
        }
        trigger.focus();
    });
    const revealForm = (moveFocus = false) => {
        section.hidden = false;
        trigger.setAttribute('aria-expanded', 'true');
        if (moveFocus) {
            document.getElementById('contact-form-title').focus({ preventScroll: true });
            section.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
        }
    };
    trigger.addEventListener('click', () => revealForm(true));
    const revealFromHash = () => {
        if (window.location.hash === '#contact-form') revealForm();
    };
    window.addEventListener('hashchange', revealFromHash);
    revealFromHash();
    const topic = document.getElementById('contact-topic');
    const customTopic = document.getElementById('contact-other-topic');
    const input = document.getElementById('contact-custom-topic');
    const updateTopic = () => {
        const isOther = topic.value === 'other';
        customTopic.hidden = !isOther;
        input.disabled = !isOther;
        input.required = isOther;
    };
    topic.addEventListener('change', updateTopic);
    window.addEventListener('pageshow', updateTopic);
    updateTopic();
})();
