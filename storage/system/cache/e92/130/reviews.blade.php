<?php 
/* /var/www/pinchepoutine.dev/tastyigniter/themes/tastyigniter-orange/_pages/local/reviews.blade.php */
class Pagic62ad14c4c14fb438124146_3ac518620b6acd2905a2554aefd5e518Class extends \Main\Template\Code\PageCode
{

public function onStart()
{
    if (!View::shared('showReviews')) {
        flash()->error(lang('igniter.local::default.review.alert_review_disabled'))->now();

        return Redirect::to($this->controller->pageUrl($this['localReview']->property('redirectPage')));
    }
}

}
