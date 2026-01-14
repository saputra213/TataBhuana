function loadScript(url) {
  return new Promise((resolve, reject) => {
    const s = document.createElement('script');
    s.src = url;
    s.async = true;
    s.onload = resolve;
    s.onerror = reject;
    document.head.appendChild(s);
  });
}

function initEditors() {
  const form = document.querySelector('form');
  document.querySelectorAll('textarea.rich-editor').forEach((el) => {
    window.ClassicEditor.create(el, {
      toolbar: {
        items: [
          'heading',
          '|',
          'bold',
          'italic',
          'link',
          'bulletedList',
          'numberedList',
          'blockQuote',
          '|',
          'insertTable',
          'undo',
          'redo'
        ],
        shouldNotGroupWhenFull: true
      },
      heading: {
        options: [
          { model: 'paragraph', title: 'Paragraf', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
          { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
          { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
          { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
          { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        ]
      },
      placeholder: 'Tulis konten artikel di sini...',
      table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
      }
    })
      .then((editor) => {
        if (form) {
          form.addEventListener('submit', () => {
            editor.updateSourceElement();
          });
        }
        editor.model.document.on('change:data', () => {
          editor.updateSourceElement();
        });
      })
      .catch(() => {});
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    loadScript('https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js')
      .then(initEditors)
      .catch(() => {});
  });
} else {
  loadScript('https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js')
    .then(initEditors)
    .catch(() => {});
}
