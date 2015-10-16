<?php
class Model {
	public function getlightboxList()
	{
		global $wpdb;
		$query = "SELECT *  from " . $wpdb->prefix . "hugeit_lightbox";
		$rows = $wpdb->get_results($query);
		$hugeit_lightbox_values = array();
		foreach ($rows as $row) {
			$key = $row->name;
			$value = $row->value;
			$hugeit_lightbox_values[$key] = $value;
		}
		return $hugeit_lightbox_values;
	}
}
?>