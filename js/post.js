/*global dotclear, he */
'use strict';

dotclear.ready(() => {
  Object.assign(dotclear, dotclear.getData('utf8mb4'));

  const encode = (elt) => {
    if (elt?.value) elt.value = he.decode(elt.value);
  };

  if (dotclear.utf8mb4n_notes_only === 0) {
    encode(document.getElementById('post_excerpt'));
    encode(document.getElementById('post_content'));
  }
  encode(document.getElementById('post_notes'));
});
