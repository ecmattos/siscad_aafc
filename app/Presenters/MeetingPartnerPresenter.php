<?php

namespace SisCad\Presenters;

use SisCad\Transformers\MeetingPartnerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MeetingPartnerPresenter.
 *
 * @package namespace SisCad\Presenters;
 */
class MeetingPartnerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MeetingPartnerTransformer();
    }
}
