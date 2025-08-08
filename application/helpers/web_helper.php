<?php
function set_active($uri)
{
	// Ambil instance CodeIgniter
	$CI =& get_instance();

	// Bandingkan dengan uri_string()
	return uri_string() == $uri
		? 'text-blue-600 font-semibold border-b-2 border-blue-600'
		: 'text-gray-600 hover:text-blue-600';
}
