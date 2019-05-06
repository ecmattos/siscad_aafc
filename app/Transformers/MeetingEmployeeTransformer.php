<?php

namespace SisCad\Transformers;

use League\Fractal\TransformerAbstract;
use SisCad\Entities\MeetingEmployee;

/**
 * Class MeetingEmployeeTransformer.
 *
 * @package namespace SisCad\Transformers;
 */
class MeetingEmployeeTransformer extends TransformerAbstract
{
    /**
     * Transform the MeetingEmployee entity.
     *
     * @param \SisCad\Entities\MeetingEmployee $model
     *
     * @return array
     */
    public function transform(MeetingEmployee $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
