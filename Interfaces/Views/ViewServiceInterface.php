<?php
namespace Selenia\Interfaces\Views;

use Selenia\Exceptions\Fatal\FileNotFoundException;
use Selenia\Exceptions\FatalException;

/**
 * The View service generates markup for displaying Graphical User Interfaces and web documents on web browsers.
 *
 * <p>It provides view template loading, compiling, caching and dynamic generation (rendering) capabilities.
 * <p>It can handle multiple templating engines via a single unified interface.
 */
interface ViewServiceInterface
{

  /**
   * Gets an engine instance with the specified class.
   *
   * @param string $class
   * @return ViewEngineInterface
   */
  function getEngine ($class);

  /**
   * @param string $fileName
   * @return ViewEngineInterface
   * @throws FatalException If no match was found.
   */
  function getEngineFromFileName ($fileName);

  /**
   * Loads and compiles the specified template file.
   *
   * @param string $path
   * @return ViewInterface
   */
  function loadFromFile ($path);

  /**
   * Compiles the given template.
   * > Don't forget to set a view engine before calling this method.
   *
   * @param string                     $src
   * @param string|ViewEngineInterface $engineOrClass The view engine's class name or an instance of it.
   * @return ViewInterface
   */
  function loadFromString ($src, $engineOrClass);

  /**
   * Attempts to load the specified view file.
   *
   * @param string $path
   * @return string The file's content.
   * @throws FileNotFoundException If the file was not found.
   */
  public function loadViewTemplate ($path);

  /**
   * Creates a new pristine instance of the same class of this view.
   *
   * @return static
   */
  function newInstance ();

  /**
   * Registes a view engine to be used for rendering files that match the given regular expression pattern.
   *
   * @param string $engineClass
   * @param string $filePattern A regular expression. Multiple patterns can be specified using the | operator.
   * @return $this
   */
  function register ($engineClass, $filePattern);

  /**
   * Renders the previously compiled template.
   *
   * @param array|object $data The view model; optional data for use by databinding expressions on the template.
   * @return string The generated output (ex: HTML).
   */
  function render ($data = null);

}
