<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{

    /**
     * statusCode
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * getStatusCode
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * setStatusCode
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * respondNotFound
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'not_found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * respondinternalError
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'internal_server_error')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * respondBadRequest
     *
     * @param string $message
     * @return mixed
     */
    public function respondBadRequest($message = 'bad_request')
    {
        return $this->setStatusCode(400)->respondWithError($message);
    }

    /**
     * respondUnprocessableEntity
     *
     * @param string $message
     * @return mixed
     */
    public function respondUnprocessableEntity($message = 'Unprocessable Entity')
    {
        return $this->setStatusCode(422)->respondWithError($message);
    }

    /**
     * respondUnauthorized
     *
     *
     * @param string $message
     * @return mixed
     */
    public function respondUnauthorized($message = 'unauthorized')
    {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    /**
     * respondForbidden
     *
     *
     * @param string $message
     * @return mixed
     */
    public function respondForbidden($message = 'forbidden')
    {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
     * respond
     *
     * @param array $data
     * @param array $headers
     */
    public function respond($data, $headers= [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * respondWithError
     *
     * @param string $message
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * respondWithPagination
     *
     * @param mixed $collection
     * @param mixed $data
     * @return mixed
     */
    protected function respondWithPagination($collection, $data)
    {
        $data = [
            'data' => $data,
            'paginator' => [
                'total_count'  => $collection->total(),
                'total_pages'  => ceil($collection->total() / $collection->perPage()),
                'current_page' => $collection->currentPage(),
                'limit'        => $collection->perPage()
            ]
        ];

        return $this->respond($data);
    }
}
