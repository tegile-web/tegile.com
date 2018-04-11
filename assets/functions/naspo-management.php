<?php

	// Supporting vars
	// naspo-docs folder path
	global $naspo_id;
	global $naspo_transfer;
	$naspo_docs_path = ABSPATH.'naspo-docs';
	$naspo_master = '/naspo-docs/Master/tegile-naspo-contract_' . strtolower($naspo_id) . '.pdf';
	$naspo_secondary = '/naspo-docs/Master/tegile-naspo-transfer_' . strtolower($naspo_transfer) . '.pdf';
	$naspo_docs = '';

	// Main Functions
	// Function to manage NASPO pages
	function naspo_page_manager() {

		d(ABSPATH);
		// if ( !defined(ABSPATH) ) {
		// 	return;
		// } else {
		// 	d(ABSPATH);
		// }

		global $naspo_docs;
		global $naspo_docs_path;
	    global $naspo_md5;
	    global $notices;

		// Uncomment for testing
		// return;
		// $naspo_md5 = '';

	    $md5sum = explode(" ", shell_exec('tar -cf - '. $naspo_docs_path .' | md5sum'))[0];

	    if ( $md5sum == $naspo_md5 ) {

			return;

	    } else {

			// Get the NASPO folder tree
			$naspo_docs = get_naspo_docs($naspo_docs_path);

			// Get the existing NASPO posts and the States folders from the NASPO tree
			$posts = get_naspo_posts();
	        $folders = array_map( 'strtolower', array_keys($naspo_docs['States']) );

			// Build our Create, Delete, and Modify lists
	        $create = array_values(array_diff( $folders, $posts ));
	        $delete = array_diff( $posts, $folders );
	        $modify = array_intersect( $posts, $folders );

			// array_diff doesn't preserve keys, so we need to add back the post IDs for deletion
	        foreach ($delete as $k => $v) {

	            unset($delete[$k]);
	            $delete[array_search( $v, $posts )] = $v;
	        }

			// Execute each function with the corresponding list of States
	        foreach (array('create','delete','modify') as $var) {

	            $func = $var.'_naspo_page';

	            if (!empty(${$var})) {
	                $func(${$var});
	            }
	        }

			// Update the NASPO md5sum to reflect the current state of the folder
			update_md5sum($md5sum);

	    }
	}

	// Function to create new NASPO pages
	function create_naspo_page( $obj ) {

	    global $notices;
		global $naspo_docs;

	    foreach ($obj as $pid => $state) {

			if ( NULL == get_page_by_title( ucwords($state), OBJECT, 'naspo_contract' ) ) {
		        $new_post = wp_insert_post(array(
		        	'post_title' => ucwords($state),
					'post_type' => 'naspo_contract',
		        	'post_status' => 'publish',
		        ));
			} else {

				d($state . ' contract already exists!!!');
				continue;
			}

	        if ( ($new_post != 0) || (!is_wp_error($new_post)) ) {

	            $notices[] = array(
	                'msg' => 'Created NASPO Contract for ' . ucwords($state),
	                'type' => 'notice notice-success',
	            );

				unset($obj[$pid]);
				$obj[$new_post] = $state;

	        } else {

	            d($new_post);

	            $notices[] = array(
	                'msg' => 'There was an issue creating the ' . ucwords($state) . ' contract. Check the Debug Bar.',
	                'type' => 'notice notice-error',
	            );
	        }
	    }

		// Use update function here
		modify_naspo_page( $obj, false );
	}

	// Function to modify an existing NASPO page
	function modify_naspo_page( $obj, $msgs = true ) {

	    if ($msgs) {

			global $notices;

		    $notices[] = array(
		        'msg' => 'Modified NASPO Contracts: ' . ucwords(implode( ", ", array_values($obj) )),
		        'type' => 'notice notice-warning',
		    );
		}

		foreach ($obj as $post_id => $state) {

			$state = get_state_addendums( $state );

			foreach ($state as $k=>$v) {

				if (is_array($v[0])) {

					update_field($k, $v, $post_id);
				} else {

					foreach ($v as $field=>$val) {

						update_field($field, $val, $post_id);
					}
				}
			}
		}
	}

	// Function to remove old NASPO pages
	function delete_naspo_page( $obj ) {

	    global $notices;

	    $notices[] = array(
	        'msg' => 'Deleted NASPO Contracts: ' . ucwords(implode( ", ", array_values($obj) )),
	        'type' => 'notice notice-error',
	    );

	    foreach ($obj as $pid => $title) {

	        wp_delete_post( $pid, $force_delete );
	    }
	}

	// Supporting functions
	// Function to get the ID and Title of existing Naspo Contract posts
	function get_naspo_posts() {

		// Build our post args
		$posts = array(
			'numberposts' => -1,
			'post_type' => 'naspo_contract'
		);

		// Fetch the posts
		$posts = get_posts( $posts );

		// We only need ID and Title fields
		$posts = wp_list_pluck( $posts, 'post_title', 'ID' );

		// Convert titles to all lowercase for matching purposes
		$posts = array_map( 'strtolower', $posts );

		// Return the list of ID => title pairs
		return $posts;
	}

	// Function to get the existing folder structure of naspo-docs
	function get_naspo_docs( $path ) {

		$iterator = new DirectoryIterator( $path );
		$tree = array();

		foreach ( $iterator as $node ) {

			if ( $node->isDir() && !$node->isDot() ) {

				$tree[$node->getFilename()] = get_naspo_docs( $node->getPathname() );
			} else if ( $node->isFile() ) {

				$tree[] = $node->getFilename();
			}
		}

		return $tree;
	}

	// Function to return an array of state specific addendum information
	// Currently only works for participating addendums.  Need to expand for additional addendums.
	function get_state_addendums( $state ) {

		// Use the global $naspo_docs variables
		global $naspo_docs;
		global $naspo_docs_path;

		// Build the addendum array
		$addendums = array(
			'participating_addendum' => array(),
			'additional_addendums' => array(),
		);

		// Generate a web-relative path to the State folder
		$state_path = str_replace(ABSPATH,'/',$naspo_docs_path).'/States/'.ucwords($state).'/';

		// Get the State folder from the NASPO tree
		$state = $naspo_docs['States'][ucwords($state)];

		foreach ( array_keys($addendums) as $type ) {

			$func = 'get_'.$type;
			$addendums[$type] = $func( $state, $state_path, str_replace('_','-',$type) );
		}

		return $addendums;
	}

	// Function to get the participating addendum for a State
	function get_participating_addendum( $state, $path, $type ) {

		// Setup our return array structure
		$obj = array();

		// Get the name of the participating addendum doc and add the web-relative path
		// [0] gets the value of the single result (or 1st result if for some reason there are more than one)
		$obj['state_addendum_document'] = $path.array_shift(array_filter($state, function($var) use ($type) { return preg_match("/\b$type\b/i", $var); }));

		// Split the filename before the contract number, take the last element,
		// then split that at the file extensions, and take the first element
		$obj['state_addendum_number'] = array_pop( explode( $type.'-', pathinfo($obj['state_addendum_document'], PATHINFO_FILENAME) ) );

		return $obj;
	}

	// Function to get and parse additional additional addendums
	function get_additional_addendums( $state, $path, $type ) {

		// Get the list of addendum docs
		$obj = array_filter($state, function($var) use ($type) { return preg_match("/\b$type\b/i", $var); });

		foreach ($obj as $k=>$doc) {

			unset($obj[$k]);

			// Split the doc into path, filename, and extension
			$doc = pathinfo($path.$doc);

			// Massage the filename to get the parts we need
			$doc['filename'] = explode('-',str_replace($type.'-','',$doc['filename']));
			$null = array_shift($doc['filename']);

			$obj[] = array(
				'type' => array_shift($doc['filename']),
				'date' => implode('/',$doc['filename']),
				'doc' => $doc['dirname'].'/'.$doc['basename'],
			);
		}
		sort($obj);
		return $obj;
	}

	// Function to update the NASPO md5sum to reflect the current state of the folder
	function update_md5sum( $hash ) {

		// Get my path to naspo_vars
		$path = get_template_directory().'/assets/functions/globals/naspo.php';

		// Read the file into memory
		$tmp = fopen( $path, "r" );
		$naspo_vars = fread( $tmp, filesize( $path ) );
		fclose( $tmp );

		// Use preg_replace to swap in the new md5sum
		$naspo_vars = preg_replace('/\$naspo_md5(.*?);/', "$" . "naspo_md5 = '" . $hash . "';", $naspo_vars);

		// Write the changes back into the original file
		$tmp = fopen( $path, "w" );
		fwrite( $tmp, $naspo_vars );
		fclose( $tmp );
	}

?>
