<?php
/**
 * Plugin Name: Private Page Login Redirect
 * Plugin URI:  https://www.parorrey.com
 * Description: Redirects non-logged in visitors to a private page from 404 page to the login page.
 * Version:     1.0.0
 * Author:      Ali Qureshi
 * Author URI:  https://www.parorrey.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Copyright (c) 2021 
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

add_action(
	'template_redirect',
	function () {
		$page_id = get_queried_object_id();
		
		 if (is_404()) {
			
		if (
			isset( $page_id ) &&
			! is_user_logged_in()
		) {
			wp_safe_redirect( wp_login_url( get_permalink( $page_id ) ) );
			exit;
		}
	 }
	}
);
