<?

/**
 * Class fabealRESTClient
 *
 * @author Pawel Maslak <pawel.maslak@fabeal.com>
 * @version 1
 * https://fabeal.com
 */

class fabealRESTClient
{
	/**
	 * host with available api
	 */
	const HOST = 'https://fabeal.com/api/v1/';

	/**
	 * connections timeout
	 */
	const TIMEOUT = 7;

	/**
	 * @var string api key current calls
	 */
	public $api_key;

	function __construct($key){
		if(!extension_loaded('curl') or !extension_loaded('json'))
			throw new Exception('Missing curl or json extension!');

		$this->api_key = $key;
	}

	/**
	 * validate strict presence parameters
	 *
	 * @param array $params
	 * @throws Exception
	 */
	private function checkParameters($params = array())
	{
		foreach($params as $param)
			if(empty($param))
				throw new Exception('Missing parameter, please check your api request params.');
	}

	/**
	 * call ping method
	 * @return mixed
	 */
	public function ping()
	{
		return $this->call('ping');
	}


	/**
	 * call get property data by id
	 * @param int $id
	 * @return mixed
	 */
	public function get_property($id = null)
	{
		$this->checkParameters(array($id, $this->api_key));
		return $this->call('property/'. (int) $id);
	}


	/**
	 * add property
	 * @param array $params
	 * @return mixed
	 */
	public function add_property($params = array())
	{
		$this->checkParameters(array($params['price'], $params['title'], $this->api_key));
		return $this->call('property', 'POST', $params);
	}


	/**
	 * cal update property by id
	 *
	 * @param null $id
	 * @param array $params
	 * @return mixed|string
	 */
	public function update_property($id = null, $params = array())
	{
		if(!is_numeric($id) or !is_array($params) or empty($params)) return 'Invalid params, please fill property data or property id.';

		return $this->call('property/'. (int) $id, 'PUT', $params);
	}


	/**
	 * delete selected property
	 *
	 * @param null $id
	 * @return mixed
	 */
	public function delete_property($id = null)
	{
		$this->checkParameters(array($id, $this->api_key));
		return $this->call('property/'. (int) $id, 'DELETE');
	}


	/**
	 * call api request
	 *
	 * @param null $api_method
	 * @param string $http_method
	 * @param array $params
	 * @return mixed
	 * @throws Exception
	 */
	private function call($api_method = null, $http_method = 'GET', $params = array())
	{
		if(empty($api_method))
			throw new Exception('Empty api_method!');

		$url = self::HOST . $api_method .'?api_key='. $this->api_key;

		//also as get method
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => self::TIMEOUT,
		);

		if($http_method == 'POST') {
			$options += array(
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => http_build_query($params),
				CURLOPT_HEADER => 0,
			);
		}
		else if($http_method == 'PUT') {
			$options += array(
				CURLOPT_CUSTOMREQUEST => 'PUT',
				CURLOPT_POSTFIELDS => http_build_query($params),
			);
		}
		else if($http_method == 'DELETE') {
			$options += array(
				CURLOPT_CUSTOMREQUEST => 'DELETE'
			);
		}

		$curl = curl_init();
		curl_setopt_array($curl, $options);
		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result);
	}
}