<?php

namespace Vanguard\Repositories\Promocode;

interface PromocodeRepository
{
    /**
     * Get all system promocodes.
     *
     * @return mixed
     */
    public function all();

    /**
     * Finds the promocode by given id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Creates new promocode from provided data.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates specified promocode.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Remove specified promocode from repository.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
