<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of utf8mb4, a plugin for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

class utf8mb4Behaviors
{
	private static function doEncoding($src) {
		// Replace 4 bytes long UTF-8 characters to their HTML entity equivalent
		return empty($src) ? $src : preg_replace_callback('/./u',function (array $match) {
	    	return strlen($match[0]) >= 4 ? mb_convert_encoding($match[0],'HTML-ENTITIES','UTF-8') : $match[0];
		},$src);
	}

	private static function doDecoding($src) {
		// Replace HTML entity (Unicode chars only) to their UTF-8 characters
		return empty($src) ? $src : preg_replace_callback('/(&#[0-9]+;)/',function (array $match) {
			return mb_convert_encoding($match[1],'UTF-8','HTML-ENTITIES');
		},$src);
	}

	public static function publicBeforeCommentCreate($cur)
	{
		$cur->comment_content = self::doEncoding($cur->comment_content);
	}

	public static function coreBeforeComment($blog,$cur)
	{
		$cur->comment_content = self::doEncoding($cur->comment_content);
	}

	public static function coreBeforePost($blog,$cur)
	{
		$cur->post_excerpt = self::doEncoding($cur->post_excerpt);
		$cur->post_excerpt_xhtml = self::doEncoding($cur->post_excerpt_xhtml);
		$cur->post_content = self::doEncoding($cur->post_content);
		$cur->post_content_xhtml = self::doEncoding($cur->post_content_xhtml);
		$cur->post_notes = self::doEncoding($cur->post_notes);
	}

	public static function adminPostEditor($editor='',$context='',array $tags=array(),$syntax='')
	{
		// Cope only with Post and Page editing
		$contexts = array('post','page');
		if (!in_array($context,$contexts)) {
			return;
		}

		// dcLegacyEditor (wiki/markdown syntax) use original textarea (others known editors use iframe)
		$syntaxes = array('wiki','markdown');
		return
			'<script type="text/javascript">'.
			dcPage::jsVar('dotclear.utf8mb4n_notes_only',$editor == 'dcLegacyEditor' && in_array($syntax,$syntaxes) ? 0 : 1).
			'</script>'."\n".
			dcPage::jsLoad(dcPage::getPF('utf8mb4/js/he.js')).
			dcPage::jsLoad(dcPage::getPF('utf8mb4/js/post.js'));
	}
}
