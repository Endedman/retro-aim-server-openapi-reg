<?php
class UserAPI {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function listUsers() {
        $url = $this->apiUrl . '/user';
        $result = file_get_contents($url);
        if ($result === FALSE) {
            return [];
        }
        return json_decode($result, true);
    }

    public function createUser($screenName, $password) {
        $url = $this->apiUrl . '/user';
        $data = array(
            'screen_name' => $screenName,
            'password' => $password
        );

        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result !== FALSE;
    }

    public function deleteUser($screenName) {
        $url = $this->apiUrl . '/user';
        $data = array('screen_name' => $screenName);

        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'DELETE',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result !== FALSE;
    }

    public function updateUserPassword($screenName, $password) {
        $url = $this->apiUrl . '/user/password';
        $data = array(
            'screen_name' => $screenName,
            'password' => $password
        );

        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result !== FALSE;
    }

    public function listActiveSessions() {
        $url = $this->apiUrl . '/session';
        $result = file_get_contents($url);
        if ($result === FALSE) {
            return [];
        }
        return json_decode($result, true);
    }
}
?>
