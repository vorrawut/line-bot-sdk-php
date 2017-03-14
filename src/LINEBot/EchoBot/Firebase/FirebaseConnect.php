<?php

/**
 * Copyright 2017
 *
 * licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace LINE\LINEBot\EchoBot\Firebase;

class FirebaseConnect{
	 protected $_todoMilk = array(
        'name' => 'Pick the milk',
        'priority' => 1
    );

	const DEFAULT_URL = 'https://linebot-a854d.firebaseio.com/';
	const DEFAULT_TOKEN = 'AIzaSyD6tM4Yf-40Wc3nk0v9hDVUN7jr9gIES3A';
	const DEFAULT_PATH = '/firebase/example';
	const DEFAULT_TODO_PATH = '/sample/todo';

	public function connectToFirebase (){

        error_log("In FirebaseConnect connectToFirebase()!");

		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

		// --- Set Firebase time out ---
		$firebase->setTimeOut(30);

		// --- storing an array ---
		$test = array(
		    "foo" => "bar",
		    "i_love" => "lamp",
		    "id" => 42
		);

		setFirebaseValue(DEFAULT_TODO_PATH, $_todoMilk, $firebase);

		// $dateTime = new DateTime();
		// $firebase->set(DEFAULT_PATH . '/' . $dateTime->format('c'), $test);

		// // --- storing a string ---
		// $firebase->set(DEFAULT_PATH . '/name/contact001', "John Doe");

		// // --- reading the stored string ---
		// $name = $firebase->get(DEFAULT_PATH . '/name/contact001');
	}

	public function setFirebaseValue($path, $value, $firebase) {
  		$firebase->set($path, $value);
	}
}
