<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $webhookUrl = 'https://laprintjayaid.webhook.office.com/webhookb2/706760ec-24de-4cab-9468-ff62c9f7a033@999b11e4-cbd7-4b93-94e5-1eb99a71a293/IncomingWebhook/c3e707296f004bd69d6762279907255b/8e99924f-511c-47b9-966c-1c9f4c67b989';
        $postData = array(
            'text' => 'Haloo Testing webhook 2'
        );

        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($postData))
            )
        );

        $result = curl_exec($ch);
        curl_close($ch);
    }
}
