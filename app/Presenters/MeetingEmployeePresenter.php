<?php

namespace SisCad\Presenters;

use SisCad\Transformers\MeetingEmployeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MeetingEmployeePresenter.
 *
 * @package namespace SisCad\Presenters;
 */
class MeetingEmployeePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MeetingEmployeeTransformer();
    }
}
