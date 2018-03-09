/*global $, dotclear, he */
'use strict';

$(function() {
	$('#edit-entry').onetabload(function() {
		if (dotclear.utf8mb4n_notes_only === '0') {
			var excerpt = $('#post_excerpt').val();
			var content = $('#post_content').val();
			if (excerpt !== undefined) {
				$('#post_excerpt').val(he.decode(excerpt));
			}
			if (content !== undefined) {
				$('#post_content').val(he.decode(content));
			}
		}
		var notes = $('#post_notes').val();
		if (notes !== undefined) {
			$('#post_notes').val(he.decode(notes));
		}
	});
});
