<?php
/**
 * Velin Admin Panel - Backend For Laravel 5
 *
 * This Auto Functions file
 * 
 * @author   Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 * 
 */

function velin()
{
	return new \Velin\Skeletons\Site();
}

function redirectBackendAction($action)
{
	return velin()->redirectBackendAction($action);
}

function urlBackendAction($action)
{
	return velin()->urlBackendAction($action);
}