<?php
namespace Slakbal\Html;

use Collective\Html\HtmlServiceProvider as IlluminateHtmlServiceProvider;

class HtmlServiceProvider extends IlluminateHtmlServiceProvider
{

	/**
	 * Register the HTML builder instance.
	 *
	 * @return void
	 */
	protected function registerHtmlBuilder()
	{
		$this->app->singleton('html', function ($app) {
			return new HtmlBuilder($app['url'], $app['view']);
		});
	}

	/**
	 * Register the form builder instance.
	 *
	 * @return void
	 */
	protected function registerFormBuilder()
	{
		$this->app->singleton('form', function ($app) {
			$form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

			return $form->setSessionStore($app['session.store']);
		});
	}
}