<dialog id="photo-viewer" class="photo-viewer" aria-label="Photo viewer">
    <div class="photo-viewer-content">
        <form method="dialog" class="photo-viewer-close">
            <button class="action" autofocus>Close <span aria-hidden="true">×</span></button>
        </form>
        <figure>
            <img alt="">
            <figcaption aria-live="polite"></figcaption>
        </figure>
        <div class="photo-viewer-controls">
            <button type="button" class="action" data-photo-step="-1"><span aria-hidden="true">←</span> Previous</button>
            <button type="button" class="action" data-photo-step="1">Next <span aria-hidden="true">→</span></button>
        </div>
    </div>
</dialog>
