/*global $, dotclear, he */
'use strict';

$(() => {
  Object.assign(dotclear, dotclear.getData('utf8mb4'));

  $('#edit-entry').on('onetabload', () => {
    if (dotclear.utf8mb4n_notes_only === 0) {
      const excerpt = $('#post_excerpt').val();
      const content = $('#post_content').val();
      if (excerpt !== undefined) {
        $('#post_excerpt').val(he.decode(excerpt));
      }
      if (content !== undefined) {
        $('#post_content').val(he.decode(content));
      }
    }
    const notes = $('#post_notes').val();
    if (notes !== undefined) {
      $('#post_notes').val(he.decode(notes));
    }
  });
});
