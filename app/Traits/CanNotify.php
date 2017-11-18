<?php

namespace App\Traits;


trait CanNotify
{
	/**
	 * @param $message
	 */
	protected function notifyError($message)
	{
		request()
			->session()
			->flash('error', $message);
	}

	/**
	 * @param $message
	 */
	protected function notifyWarning($message)
	{
		request()
			->session()
			->flash('warning', $message);
	}


	/**
	 * @param $message
	 */
	protected function notifySuccess($message)
	{
		request()
			->session()
			->flash('success', $message);
	}

	/**
	 * @param $message
	 */
	protected function notifyInfo($message)
	{
		request()
			->session()
			->flash('info', $message);
	}

	/**
	 * @param $message
	 * @param $route
	 * @return \Illuminate\Http\RedirectResponse
	 */
	protected function notifyErrorRedirect($message, $route)
	{
		request()
			->session()
			->flash('error', $message);
		return redirect()->route($route);
	}


	/**
	 * @param $message
	 * @param $route
	 * @return \Illuminate\Http\RedirectResponse
	 */
	protected function notifySuccessRedirect($message, $route)
	{
		request()
			->session()
			->flash('success', $message);
		return redirect()->route($route);
	}

	/**
	 * @param $message
	 * @param $route
	 * @return \Illuminate\Http\RedirectResponse
	 */
	protected function notifyInfoRedirect($message, $route)
	{
		request()
			->session()
			->flash('info', $message);
		return redirect()->route($route);
	}

	/**
	 * @param $id
	 */
	protected function highlight($id)
	{
		request()
			->session()
			->flash('highlight', $id);
	}
}