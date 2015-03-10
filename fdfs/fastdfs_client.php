<?php
define('FDFS_FILE_ID_SEPERATOR', '/');
define('FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE', 'O');
define('FDFS_STORAGE_SET_METADATA_FLAG_MERGE', 'M');
define('FDFS_STORAGE_STATUS_INIT', 0);
define('FDFS_STORAGE_STATUS_WAIT_SYNC', 1);
define('FDFS_STORAGE_STATUS_SYNCING', 2);
define('FDFS_STORAGE_STATUS_DELETED', 4);
define('FDFS_STORAGE_STATUS_OFFLINE', 5);
define('FDFS_STORAGE_STATUS_ONLINE', 6);
define('FDFS_STORAGE_STATUS_ACTIVE', 7);
define('FDFS_STORAGE_STATUS_NONE', 99);

/**
 * @return string - client library version
 */
function fastdfs_client_version(){ }

/**
 * send ACTIVE_TEST cmd to the server
 * @param array $server_info: the assoc array including elements: ip_addr, port and sock, sock must be connected
 * @return bool - true for success, false for error
 */
function fastdfs_active_test($server_info){ }

/**
 * connect to the server
 * @param string $ip_addr: the ip address of the server
 * @param int $port: the port of the server
 * @return array|bool assoc array for success, false for error
 */
function fastdfs_connect_server($ip_addr, $port){ }

/**
 * disconnect from the server
 * @param array $server_info: the assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_disconnect_server($server_info){ }

/**
 * @return int  - last error no
 */
function fastdfs_get_last_error_no(){ }

/**
 * @return string - last error info
 */
function fastdfs_get_last_error_info(){ }

/**
 * get a connected tracker server
 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
 */
function fastdfs_tracker_get_connection(){ }

/**
 * connect to all tracker servers
 * @return bool - true for success, false for error
 */
function fastdfs_tracker_make_all_connections(){ }

/**
 * close all connections to the tracker servers
 * @return bool true for success, false for error
 */
function fastdfs_tracker_close_all_connections(){ }

/**
 * get group stat info
 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool - index array for success, false for error, each group as a array element
 */
function fastdfs_tracker_list_groups($group_name = NULL, $tracker_server = NULL){ }

/**
 * get the storage server info to upload file
 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool return assoc array for success, false for error. the assoc array including elements: ip_addr, port, sock and store_path_index
 */
function fastdfs_tracker_query_storage_store($group_name = NULL, $tracker_server = NULL){ }

/**
 * get the storage server list to upload file
 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array - indexed storage server array for success, false for error. each element is an ssoc array including elements: ip_addr, port, sock and store_path_index
 */
function fastdfs_tracker_query_storage_store_list($group_name = NULL, $tracker_server = NULL){ }

/**
 * get the storage server info to set metadata
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
 */
function fastdfs_tracker_query_storage_update($group_name, $remote_filename, $tracker_server = NULL){ }

/**
 * get the storage server info to download file (or get metadata)
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
 */
function fastdfs_tracker_query_storage_fetch($group_name, $remote_filename, $tracker_server = NULL){ }

/**
 * get the storage server list which can retrieve the file content or metadata
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool - index array for success, false for error. each server as an array element
 */
function fastdfs_tracker_query_storage_list($group_name, $remote_filename, $tracker_server = NULL){ }

/**
 * get the storage server info to set metadata
 * @param string $file_id: the file id of the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
 */
function fastdfs_tracker_query_storage_update1($file_id, $tracker_server = NULL){ }

/**
 * get the storage server info to download file (or get metadata)
 * @param string $file_id: the file id of the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
 */
function fastdfs_tracker_query_storage_fetch1($file_id, $tracker_server = NULL){ }

/**
 * get the storage server list which can retrieve the file content or metadata
 * @param string $file_id: the file id of the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @return array|bool - index array for success, false for error. each server as an array element
 */
function fastdfs_tracker_query_storage_list1($file_id, $tracker_server = NULL){ }

/**
 * delete the storage server from the cluster
 * @param string $group_name: the group name of the storage server
 * @param string $storage_ip: the ip address of the storage server to be deleted
 * @return bool - true for success, false for error
 */
function fastdfs_tracker_delete_storage($group_name, $storage_ip){ }

/**
 * upload local file to storage server
 * @param string $local_filename: the local filename
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool -assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_by_filename($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload local file to storage server
 * @param string $local_filename: the local filename
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_by_filename1($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server
 * @param string $file_buff: the file content
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool -assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_by_filebuff($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server
 * @param string $file_buff: the file content
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback as appender file
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback as appender file
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append local file to the appender file of storage server
 * @param string $local_filename: the local filename
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_filename($local_filename, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append local file to the appender file of storage server
 * @param string $local_filename: the local filename
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_filename1($local_filename, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append file buff to the appender file of storage server
 * @param string $file_buff: the file content
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_filebuff($file_buff, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append file buff to the appender file of storage server
 * @param string $file_buff: the file content
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_filebuff1($file_buff, $appender_file_id, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append file to the appender file of storage server by callback
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_callback($callback_array, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * append file to the appender file of storage server by callback
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 * @return bool - true for success, false for error
 */
function fastdfs_storage_append_by_callback1($callback_array, $appender_file_id, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by local file
 * @param string $local_filename: the local filename
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_filename($local_filename, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by local file
 * @param string $local_filename: the local filename
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_filename1($local_filename, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by local file
 * @param string $file_buff: the file content
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_filebuff($file_buff, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by local file
 * @param string $file_buff: the file content
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_filebuff1($file_buff, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by callback
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $group_name: the the group name of appender file
 * @param string $appender_filename: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_callback($callback_array, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * modify appender file by callback
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $appender_file_id: the appender filename
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_modify_by_callback1($callback_array, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload local file to storage server as appender file
 * @param string $local_filename: the local filename
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_appender_by_filename($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload local file to storage server as appender file
 * @param string $local_filename: the local filename
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_appender_by_filename1($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server as appender file
 * @param string $file_buff: the file content
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_appender_by_filebuff($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server as appender file
 * @param string $file_buff: the file content
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_appender_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback as appender file
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_appender_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback as appender file
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $group_name: specify the group name to store the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_appender_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload local file to storage server (slave file mode)
 * @param string $local_filename: the local filename
 * @param string $group_name: the group name of the master file
 * @param string $master_filename: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_slave_by_filename($local_filename, $group_name, $master_filename, $prefix_name, $file_ext_name = NULL, $meta_list = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload local file to storage server (slave file mode)
 * @param string $local_filename: the local filename
 * @param string $master_file_id: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_slave_by_filename1($local_filename, $master_file_id, $prefix_name, $file_ext_name = NULL, $meta_list = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server (slave file mode)
 * @param string $file_buff: the file content
 * @param string $group_name: the group name of the master file
 * @param string $master_filename: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_slave_by_filebuff($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file buff to storage server (slave file mode)
 * @param string $file_buff: the file content
 * @param string $master_file_id: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_slave_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback (slave file mode)
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $group_name: the group name of the master file
 * @param string $master_filename: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool - assoc array for success, false for error.
 *        the returned array includes elements: group_name and filename
 */
function fastdfs_storage_upload_slave_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * upload file to storage server by callback (slave file mode)
 * @param array $callback_array: the callback assoc array, must have keys:
 *                    callback  - the php callback function name
 *                         callback function prototype as: function upload_file_callback($sock, $args)
 *                     file_size - the file size
 *                     args      - use argument for callback function
 * @param string $master_file_id: the master filename to generate the slave file id
 * @param string $prefix_name: the prefix name to generage the slave file id
 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool - file_id for success, false for error.
 */
function fastdfs_storage_upload_slave_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * delete file from storage server
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_delete_file($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * delete file from storage server
 * @param string $file_id: the file id to be deleted
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_delete_file1($file_id, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * truncate appender file to specify size
 * @param string $group_name: the group name of the file
 * @param string $appender_filename: the appender filename
 * @param [optional] int $truncated_file_size : truncate the file size to
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_truncate_file($group_name, $appender_filename, $truncated_file_size = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * truncate appender file to specify size
 * @param string $file_id: the appender file id
 * @param [optional] int $truncated_file_size : truncate the file size to
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for success, false for error
 */
function fastdfs_storage_truncate_file1($file_id, $truncated_file_size = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * get file content from storage server
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool the file content for success, false for error
 */
function fastdfs_storage_download_file_to_buff($group_name, $remote_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * get file content from storage server
 * @param string $file_id: the file id of the file
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return string|bool the file content for success, false for error
 */
function fastdfs_storage_download_file_to_buff1($file_id, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * download file from storage server to local file
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param string $local_filename : the local filename to save the file content
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return boll  - true for success, false for error
 */
function fastdfs_storage_download_file_to_file($group_name, $appender_filename, $local_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * download file from storage server to local file
 * @param string $file_id: the file id of the file
 * @param string $local_filename : the local filename to save the file content
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return boll  - true for success, false for error
 */
function fastdfs_storage_download_file_to_file1($file_id, $local_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * download file from storage server to local file
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param array $download_callback : the download callback array, elements as:
 *                    callback  - the php callback function name
 *                         function my_download_file_callback($args, $file_size, $data)
 *                    args      - use argument for callback function
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool  - true for success, false for error
 */
function fastdfs_storage_download_file_to_callback($group_name, $appender_filename, $download_callback, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * download file from storage server to local file
 * @param string $file_id: the file id of the file
 * @param array $download_callback : the download callback array, elements as:
 *                    callback  - the php callback function name
 *                         function my_download_file_callback($args, $file_size, $data)
 *                    args      - use argument for callback function
 * @param [optional] int $file_offset :file start offset, default value is 0
 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool  - true for success, false for error
 */
function fastdfs_storage_download_file_to_callback1($file_id, $download_callback, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * set meta data of the file
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param array $meta_list: meta data assoc array to be set, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $op_type: operate flag, can be one of following flags:
 *             FDFS_STORAGE_SET_METADATA_FLAG_MERGE: combined with the old meta data
 *             FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE: overwrite the old meta data
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool  - true for success, false for error
 */
function fastdfs_storage_set_metadata($group_name, $remote_filename, $meta_list, $op_type = FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * set meta data of the file
 * @param string $file_id: the file id of the file
 * @param array $meta_list: meta data assoc array to be set, such as array('width'=>1024, 'height'=>768)
 * @param [optional] string $op_type: operate flag, can be one of following flags:
 *             FDFS_STORAGE_SET_METADATA_FLAG_MERGE: combined with the old meta data
 *             FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE: overwrite the old meta data
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return bool  - true for success, false for error
 */
function fastdfs_storage_set_metadata1($file_id, $meta_list, $op_type = FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * get meta data of the file
 * @param string $group_name: the group name of the file
 * @param string $remote_filename: the filename on the storage server
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool    assoc array for success, false for error, returned array like: array('width' => 1024, 'height' => 768)
 */
function fastdfs_storage_get_metadata($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * get meta data of the file
 * @param string $file_id: the file id of the file
 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
 * @return array|bool    assoc array for success, false for error, returned array like: array('width' => 1024, 'height' => 768)
 */
function fastdfs_storage_get_metadata1($file_id, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * generate anti-steal token for HTTP download
 * @param string $remote_filename - the remote filename (do NOT including group name)
 * @param int $timestamp - the timestamp (unix timestamp)
 * @return string|bool  token string for success, false for error
 */
function fastdfs_http_gen_token($remote_filename, $timestamp){ }

/**
 * get file info from the filename
 * @param string $group_name - the group name of the file
 * @param string $remote_filename - the filename on the storage server
 * @return array|bool  - assoc array for success, false for error.
 *                     - the assoc array including following elements:
 *                     - create_timestamp: the file create timestamp (unix timestamp)
 *                     - file_size: the file size (bytes)
 *                     - source_ip_addr: the source storage server ip address
 */
function fastdfs_get_file_info($group_name, $remote_filename){ }

/**
 * get file info from the file id
 * @param string $file_id - the file id (including group name and filename) or remote filename
 * @return array|bool    - assoc array for success, false for error.
 *                        - the assoc array including following elements:
 *                        - create_timestamp: the file create timestamp (unix timestamp)
 *                        - file_size: the file size (bytes)
 *                         - source_ip_addr: the source storage server ip address
 */
function fastdfs_get_file_info1($file_id){ }

/**
 * check file exist
 * @param string $group_name : the group name of the file
 * @param string $remote_filename : the filename on the storage server
 * @param [optional] array $tracker_server : the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server : the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for exist, false for not exist
 */
function fastdfs_storage_file_exist($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * check file exist
 * @param string $file_id - the file id (including group name and filename) or remote filename
 * @param [optional] array $tracker_server : the tracker server assoc array including elements: ip_addr, port and sock
 * @param [optional] array $storage_server : the storage server assoc array including elements: ip_addr, port and sock
 * @return bool - true for exist, false for not exist
 */
function fastdfs_storage_file_exist1($file_id, $tracker_server = NULL, $storage_server = NULL){ }

/**
 * generate slave filename by master filename, prefix name and file extension name
 * @param string $master_filename : the master filename / file id to generate the slave filename
 * @param string $prefix_name : the prefix name  to generate the slave filename
 * @param [optional] string $file_ext_name : slave file extension name, can be null or emtpy (do not including dot)
 * @return string|bool - slave filename string for success, false for error
 */
function fastdfs_gen_slave_filename($master_filename, $prefix_name, $file_ext_name = NULL){ }

/**
 * @param resource $sock : the unix socket description
 * @param string $buff : the buff to send
 * @return bool - true for success, false for error
 */
function fastdfs_send_data($sock, $buff){ }

class FastDFS
{
	public function __construct(){ }

	/**
	 * get a connected tracker server
	 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
	 */
	public function tracker_get_connection(){ return fastdfs_tracker_get_connection(); }

	/**
	 * connect to all tracker servers
	 * @return bool - true for success, false for error
	 */
	public function tracker_make_all_connections(){ return fastdfs_tracker_make_all_connections(); }

	/**
	 * close all connections to the tracker servers
	 * @return bool true for success, false for error
	 */
	public function tracker_close_all_connections(){ return fastdfs_tracker_close_all_connections(); }

	/**
	 * send ACTIVE_TEST cmd to the server
	 * @param array $server_info: the assoc array including elements: ip_addr, port and sock, sock must be connected
	 * @return bool - true for success, false for error
	 */
	public function active_test($server_info){ return fastdfs_active_test($server_info); }

	/**
	 * connect to the server
	 * @param string $ip_addr: the ip address of the server
	 * @param int $port: the port of the server
	 * @return array|bool assoc array for success, false for error
	 */
	public function connect_server($ip_addr, $port){ return fastdfs_connect_server($ip_addr, $port); }

	/**
	 * disconnect from the server
	 * @param array $server_info: the assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function disconnect_server($server_info){ return fastdfs_disconnect_server($server_info); }

	/**
	 * get group stat info
	 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - index array for success, false for error, each group as a array element
	 */
	public function tracker_list_groups($group_name = NULL, $tracker_server = NULL){ return fastdfs_tracker_list_groups($group_name, $tracker_server); }

	/**
	 * get the storage server info to upload file
	 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool return assoc array for success, false for error. the assoc array including elements: ip_addr, port, sock and store_path_index
	 */
	public function tracker_query_storage_store($group_name = NULL, $tracker_server = NULL){ return fastdfs_tracker_query_storage_store($group_name, $tracker_server); }

	/**
	 * get the storage server list to upload file
	 * @param [optional] string $group_name: specify the group name, null or empty string means all groups
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array - indexed storage server array for success, false for error. each element is an ssoc array including elements: ip_addr, port, sock and store_path_index
	 */
	public function tracker_query_storage_store_list($group_name = NULL, $tracker_server = NULL){ return fastdfs_tracker_query_storage_store_list($group_name, $tracker_server); }

	/**
	 * get the storage server info to set metadata
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
	 */
	public function tracker_query_storage_update($group_name, $remote_filename, $tracker_server = NULL){ return fastdfs_tracker_query_storage_update(); }

	/**
	 * get the storage server info to download file (or get metadata)
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
	 */
	public function tracker_query_storage_fetch($group_name, $remote_filename, $tracker_server = NULL){ return fastdfs_tracker_query_storage_fetch(); }

	/**
	 * get the storage server list which can retrieve the file content or metadata
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - index array for success, false for error. each server as an array element
	 */
	public function tracker_query_storage_list($group_name, $remote_filename, $tracker_server = NULL){ return fastdfs_tracker_query_storage_list(); }

	/**
	 * get the storage server info to set metadata
	 * @param string $file_id: the file id of the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
	 */
	public function tracker_query_storage_update1($file_id, $tracker_server = NULL){ return fastdfs_tracker_query_storage_update1(); }

	/**
	 * get the storage server info to download file (or get metadata)
	 * @param string $file_id: the file id of the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error, the assoc array including elements: ip_addr, port and sock
	 */
	public function tracker_query_storage_fetch1($file_id, $tracker_server = NULL){ return fastdfs_tracker_query_storage_fetch1(); }

	/**
	 * get the storage server list which can retrieve the file content or metadata
	 * @param string $file_id: the file id of the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - index array for success, false for error. each server as an array element
	 */
	public function tracker_query_storage_list1($file_id, $tracker_server = NULL){ return fastdfs_tracker_query_storage_list1(); }

	/**
	 * delete the storage server from the cluster
	 * @param string $group_name: the group name of the storage server
	 * @param string $storage_ip: the ip address of the storage server to be deleted
	 * @return bool - true for success, false for error
	 */
	public function tracker_delete_storage($group_name, $storage_ip){ return fastdfs_tracker_delete_storage($group_name, $storage_ip); }

	/**
	 * upload local file to storage server
	 * @param string $local_filename: the local filename
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool -assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_by_filename($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_filename($local_filename, $file_ext_name, $meta_list, $group_name, $tracker_server, $storage_server); }

	/**
	 * upload local file to storage server
	 * @param string $local_filename: the local filename
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_by_filename1($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_filename1(); }

	/**
	 * upload file buff to storage server
	 * @param string $file_buff: the file content
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool -assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_by_filebuff($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_filebuff(); }

	/**
	 * upload file buff to storage server
	 * @param string $file_buff: the file content
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_filebuff1(); }

	/**
	 * upload file to storage server by callback as appender file
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_callback(); }

	/**
	 * upload file to storage server by callback as appender file
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_by_callback1(); }

	/**
	 * append local file to the appender file of storage server
	 * @param string $local_filename: the local filename
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_filename($local_filename, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_filename(); }

	/**
	 * append local file to the appender file of storage server
	 * @param string $local_filename: the local filename
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_filename1($local_filename, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_filename1(); }


	/**
	 * append file buff to the appender file of storage server
	 * @param string $file_buff: the file content
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_filebuff($file_buff, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_filebuff(); }

	/**
	 * append file buff to the appender file of storage server
	 * @param string $file_buff: the file content
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_filebuff1($file_buff, $appender_file_id, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_filebuff1(); }

	/**
	 * append file to the appender file of storage server by callback
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_callback($callback_array, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_callback(); }

	/**
	 * append file to the appender file of storage server by callback
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 * @return bool - true for success, false for error
	 */
	public function storage_append_by_callback1($callback_array, $appender_file_id, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_append_by_callback1(); }

	/**
	 * modify appender file by local file
	 * @param string $local_filename: the local filename
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_filename($local_filename, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_filename(); }

	/**
	 * modify appender file by local file
	 * @param string $local_filename: the local filename
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_filename1($local_filename, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_filename1(); }

	/**
	 * modify appender file by local file
	 * @param string $file_buff: the file content
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_filebuff($file_buff, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_filebuff(); }

	/**
	 * modify appender file by local file
	 * @param string $file_buff: the file content
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_filebuff1($file_buff, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_filebuff1(); }

	/**
	 * modify appender file by callback
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $group_name: the the group name of appender file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_callback($callback_array, $file_offset, $group_name, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_callback(); }

	/**
	 * modify appender file by callback
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $appender_file_id: the appender filename
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_modify_by_callback1($callback_array, $appender_file_id, $appender_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_modify_by_callback1(); }

	/**
	 * upload local file to storage server as appender file
	 * @param string $local_filename: the local filename
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_appender_by_filename($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_filename(); }

	/**
	 * upload local file to storage server as appender file
	 * @param string $local_filename: the local filename
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_appender_by_filename1($local_filename, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_filename1(); }

	/**
	 * upload file buff to storage server as appender file
	 * @param string $file_buff: the file content
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_appender_by_filebuff($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_filebuff(); }

	/**
	 * upload file buff to storage server as appender file
	 * @param string $file_buff: the file content
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_appender_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_filebuff1(); }

	/**
	 * upload file to storage server by callback as appender file
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_appender_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_callback(); }

	/**
	 * upload file to storage server by callback as appender file
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $group_name: specify the group name to store the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_appender_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_appender_by_callback1(); }

	/**
	 * upload local file to storage server (slave file mode)
	 * @param string $local_filename: the local filename
	 * @param string $group_name: the group name of the master file
	 * @param string $master_filename: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_slave_by_filename($local_filename, $group_name, $master_filename, $prefix_name, $file_ext_name = NULL, $meta_list = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_filename(); }

	/**
	 * upload local file to storage server (slave file mode)
	 * @param string $local_filename: the local filename
	 * @param string $master_file_id: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_slave_by_filename1($local_filename, $master_file_id, $prefix_name, $file_ext_name = NULL, $meta_list = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_filename1(); }

	/**
	 * upload file buff to storage server (slave file mode)
	 * @param string $file_buff: the file content
	 * @param string $group_name: the group name of the master file
	 * @param string $master_filename: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_slave_by_filebuff($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_filebuff(); }

	/**
	 * upload file buff to storage server (slave file mode)
	 * @param string $file_buff: the file content
	 * @param string $master_file_id: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_slave_by_filebuff1($file_buff, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_filebuff1(); }

	/**
	 * upload file to storage server by callback (slave file mode)
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $group_name: the group name of the master file
	 * @param string $master_filename: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool - assoc array for success, false for error.
	 *        the returned array includes elements: group_name and filename
	 */
	public function storage_upload_slave_by_callback($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_callback(); }

	/**
	 * upload file to storage server by callback (slave file mode)
	 * @param array $callback_array: the callback assoc array, must have keys:
	 *                    callback  - the php callback function name
	 *                         callback function prototype as: function upload_file_callback($sock, $args)
	 *                     file_size - the file size
	 *                     args      - use argument for callback function
	 * @param string $master_file_id: the master filename to generate the slave file id
	 * @param string $prefix_name: the prefix name to generage the slave file id
	 * @param [optional] string $file_ext_name: the file extension name, do not include dot(.)
	 * @param [optional] array $meta_list: meta data assoc array, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool - file_id for success, false for error.
	 */
	public function storage_upload_slave_by_callback1($callback_array, $file_ext_name = NULL, $meta_list = NULL, $group_name = NULL, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_upload_slave_by_callback1(); }

	/**
	 * delete file from storage server
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_delete_file($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_delete_file(); }

	/**
	 * delete file from storage server
	 * @param string $file_id: the file id to be deleted
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_delete_file1($file_id, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_delete_file1(); }

	/**
	 * truncate appender file to specify size
	 * @param string $group_name: the group name of the file
	 * @param string $appender_filename: the appender filename
	 * @param [optional] int $truncated_file_size : truncate the file size to
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_truncate_file($group_name, $appender_filename, $truncated_file_size = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_truncate_file(); }

	/**
	 * truncate appender file to specify size
	 * @param string $file_id: the appender file id
	 * @param [optional] int $truncated_file_size : truncate the file size to
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for success, false for error
	 */
	public function storage_truncate_file1($file_id, $truncated_file_size = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_truncate_file1(); }

	/**
	 * get file content from storage server
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool the file content for success, false for error
	 */
	public function storage_download_file_to_buff($group_name, $remote_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_buff(); }

	/**
	 * get file content from storage server
	 * @param string $file_id: the file id of the file
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return string|bool the file content for success, false for error
	 */
	public function storage_download_file_to_buff1($file_id, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_buff1(); }

	/**
	 * download file from storage server to local file
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param string $local_filename : the local filename to save the file content
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return boll  - true for success, false for error
	 */
	public function storage_download_file_to_file($group_name, $appender_filename, $local_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_file(); }

	/**
	 * download file from storage server to local file
	 * @param string $file_id: the file id of the file
	 * @param string $local_filename : the local filename to save the file content
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return boll  - true for success, false for error
	 */
	public function storage_download_file_to_file1($file_id, $local_filename, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_file1(); }

	/**
	 * download file from storage server to local file
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param array $download_callback : the download callback array, elements as:
	 *                    callback  - the php callback function name
	 *                         function my_download_file_callback($args, $file_size, $data)
	 *                    args      - use argument for callback function
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool  - true for success, false for error
	 */
	public function storage_download_file_to_callback($group_name, $appender_filename, $download_callback, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_callback(); }

	/**
	 * download file from storage server to local file
	 * @param string $file_id: the file id of the file
	 * @param array $download_callback : the download callback array, elements as:
	 *                    callback  - the php callback function name
	 *                         function my_download_file_callback($args, $file_size, $data)
	 *                    args      - use argument for callback function
	 * @param [optional] int $file_offset :file start offset, default value is 0
	 * @param [optional] int $download_bytes : 0 (default value) means from the file offset to the file end
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool  - true for success, false for error
	 */
	public function storage_download_file_to_callback1($file_id, $download_callback, $file_offset = 0, $download_bytes = 0, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_download_file_to_callback1(); }

	/**
	 * set meta data of the file
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param array $meta_list: meta data assoc array to be set, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $op_type: operate flag, can be one of following flags:
	 *             FDFS_STORAGE_SET_METADATA_FLAG_MERGE: combined with the old meta data
	 *             FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE: overwrite the old meta data
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool  - true for success, false for error
	 */
	public function storage_set_metadata($group_name, $remote_filename, $meta_list, $op_type = FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_set_metadata(); }

	/**
	 * set meta data of the file
	 * @param string $file_id: the file id of the file
	 * @param array $meta_list: meta data assoc array to be set, such as array('width'=>1024, 'height'=>768)
	 * @param [optional] string $op_type: operate flag, can be one of following flags:
	 *             FDFS_STORAGE_SET_METADATA_FLAG_MERGE: combined with the old meta data
	 *             FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE: overwrite the old meta data
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool  - true for success, false for error
	 */
	public function storage_set_metadata1($file_id, $meta_list, $op_type = FDFS_STORAGE_SET_METADATA_FLAG_OVERWRITE, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_set_metadata1(); }

	/**
	 * get meta data of the file
	 * @param string $group_name: the group name of the file
	 * @param string $remote_filename: the filename on the storage server
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool    assoc array for success, false for error, returned array like: array('width' => 1024, 'height' => 768)
	 */
	public function storage_get_metadata($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_get_metadata(); }

	/**
	 * get meta data of the file
	 * @param string $file_id: the file id of the file
	 * @param [optional] array $tracker_server: the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server: the storage server assoc array including elements: ip_addr, port and sock
	 * @return array|bool    assoc array for success, false for error, returned array like: array('width' => 1024, 'height' => 768)
	 */
	public function storage_get_metadata1($file_id, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_get_metadata1(); }

	/**
	 * check file exist
	 * @param string $group_name : the group name of the file
	 * @param string $remote_filename : the filename on the storage server
	 * @param [optional] array $tracker_server : the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server : the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for exist, false for not exist
	 */
	public function storage_file_exist($group_name, $remote_filename, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_file_exist(); }

	/**
	 * check file exist
	 * @param string $file_id - the file id (including group name and filename) or remote filename
	 * @param [optional] array $tracker_server : the tracker server assoc array including elements: ip_addr, port and sock
	 * @param [optional] array $storage_server : the storage server assoc array including elements: ip_addr, port and sock
	 * @return bool - true for exist, false for not exist
	 */
	public function storage_file_exist1($file_id, $tracker_server = NULL, $storage_server = NULL){ return fastdfs_storage_file_exist1(); }

	/**
	 * @return int  - last error no
	 */
	public function get_last_error_no(){ return fastdfs_get_last_error_no(); }

	/**
	 * @return string - last error info
	 */
	public function get_last_error_info(){ return fastdfs_get_last_error_info(); }

	/**
	 * generate anti-steal token for HTTP download
	 * @param string $remote_filename - the remote filename (do NOT including group name)
	 * @param int $timestamp - the timestamp (unix timestamp)
	 * @return string|bool  token string for success, false for error
	 */
	public function http_gen_token($remote_filename, $timestamp){ return fastdfs_http_gen_token(); }

	/**
	 * get file info from the filename
	 * @param string $group_name - the group name of the file
	 * @param string $remote_filename - the filename on the storage server
	 * @return array|bool  - assoc array for success, false for error.
	 *                     - the assoc array including following elements:
	 *                     - create_timestamp: the file create timestamp (unix timestamp)
	 *                     - file_size: the file size (bytes)
	 *                     - source_ip_addr: the source storage server ip address
	 */
	public function get_file_info($group_name, $remote_filename){ return fastdfs_get_file_info(); }

	/**
	 * get file info from the file id
	 * @param string $file_id - the file id (including group name and filename) or remote filename
	 * @return array|bool    - assoc array for success, false for error.
	 *                        - the assoc array including following elements:
	 *                        - create_timestamp: the file create timestamp (unix timestamp)
	 *                        - file_size: the file size (bytes)
	 *                         - source_ip_addr: the source storage server ip address
	 */
	public function get_file_info1($file_id){ return fastdfs_get_file_info1(); }

	/**
	 * @param resource $sock : the unix socket description
	 * @param string $buff : the buff to send
	 * @return bool - true for success, false for error
	 */
	public function send_data($sock, $buff){ return fastdfs_send_data(); }

	/**
	 * generate slave filename by master filename, prefix name and file extension name
	 * @param string $master_filename : the master filename / file id to generate the slave filename
	 * @param string $prefix_name : the prefix name  to generate the slave filename
	 * @param [optional] string $file_ext_name : slave file extension name, can be null or emtpy (do not including dot)
	 * @return string|bool - slave filename string for success, false for error
	 */
	public function gen_slave_filename($master_filename, $prefix_name, $file_ext_name = NULL){ return fastdfs_gen_slave_filename(); }

	/**
	 * close tracker connections
	 * @return bool
	 */
	public function close(){ }
}