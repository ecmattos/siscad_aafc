<?php

namespace SisCad\Transformers;

use League\Fractal\TransformerAbstract;
use SisCad\Entities\MeetingPartner;

/**
 * Class MeetingPartnerTransformer.
 *
 * @package namespace SisCad\Transformers;
 */
class MeetingPartnerTransformer extends TransformerAbstract
{
    /**
     * Transform the MeetingPartner entity.
     *
     * @param \SisCad\Entities\MeetingPartner $model
     *
     * @return array
     */
    public function transform(MeetingPartner $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
