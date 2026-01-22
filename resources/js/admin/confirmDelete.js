window.confirmDelete = function (id) {
  if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
    const form = document.getElementById('delete-form-' + id);
    if (form) {
      form.submit();
    }
  }
};
