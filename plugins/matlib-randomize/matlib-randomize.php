<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use Grav\Common\Page\Collection;
use Grav\Common\Uri;
use Grav\Common\Page\Pages;

/**
 * Class MatlibRandomizePlugin
 * @package Grav\Plugin
 */
class MatlibRandomizePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                // Uncomment following line when plugin requires Grav < 1.7
                // ['autoload', 100000],
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
     * Composer autoload
     *
     * @return ClassLoader
     */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $path = $this->grav['uri']->path();
	$this->grav['log']->notice("Random URI initialized: {$uri}");
        $route_item = $this->config->get('plugins.matlib-randomize.route_item.url');
        $route_material = $this->config->get('plugins.matlib-randomize.route_material.url');
        $route_process = $this->config->get('plugins.matlib-randomize.route_process.url');

	$routes = [$route_item, $route_material, $route_process];

	$will_redirect = count($routes) && in_array($path, $routes);

	$this->grav['log']->notice("Current path in options? {$will_redirect}");
        if ($will_redirect) {
            $this->enable([
                'onPageInitialized' => ['onPageInitialized', 0]
            ]);
        }
    }
    
    /**
     * Display random page.
     */
    public function onPageInitialized()
    {
        // /** @var Taxonomy $taxonomy_map */
        // $taxonomy_map = $this->grav['taxonomy'];
        // $filters = (array) $this->config->get('plugins.random.filters');
        // $operator = $this->config->get('plugins.random.filter_combinator', 'and');

        switch($this->grav['uri']->getCurrentRoute())
        {
            case $this->config->get('plugins.matlib-randomize.route_item.url'):
                $route = $this->config->get('plugins.matlib-randomize.route_item.route');
		$this->redirectToRandomPage($route);
                break;
            case $this->config->get('plugins.matlib-randomize.route_material.url'):
                $route = $this->config->get('plugins.matlib-randomize.route_material.route');
                $this->redirectToRandomPage($route);
                break;
            case $this->config->get('plugins.matlib-randomize.route_process.url'):
                $route = $this->config->get('plugins.matlib-randomize.route_process.route');
                $this->redirectToRandomPage($route);
                break;
            default:
		$this->grav['log']->error("\nERROR:\nRandom page initialized but somehow not");
		$this->grav['log']->error("URI: {$this->grav['uri']->getCurrentRoute()}\n");
		$this->grav['log']->error("Should be: {$this->config->get('plugins.matlib-randomize.route_process.url')}");
                break;
        }
    }

    protected function redirectToRandomPage($route)
    {
	    $this->grav['log']->notice("Finding random page in category {$route}");
	    $collection = new Collection(['@page.children', $route]);
	    if (count($collection)) {
		    $this->grav['log']->notice("Collection successfully initialized");
		    unset($this->grav['page']);
		    $page = $collection->random()->current();

		    if ($this->config->get('plugins.matlib-randomize.redirect', true)) {
			    $this->grav->redirect($page->url(true));
		    } else {
			    // override the modified time
			    $page->modified(time());
			    $this->grav['page'] = $page;

			    // Convince the URI object that it is this random page...
			    $uri = $this->grav['uri'];
			    $uri->url = $uri->base().$page->url();
			    $uri->init();
		    }
	    }

    }
}
