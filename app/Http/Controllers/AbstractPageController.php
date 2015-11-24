<?php
namespace MailMarketing\Http\Controllers;

class AbstractPageController extends Controller
{

    /**
     * Blade extension.
     *
     * @var string $bladeExt
     */
    static protected $bladeExt = '.blade.php';

    /**
     * The data collection that will passed into view.
     *
     * @var array $data
     */
    protected $data = [];

    /**
     * Layout directory property.
     *
     * @var string $layoutDir
     */
    protected $layoutDir = 'layouts';

    /**
     * Content directory property.
     *
     * @var string $contentDir
     */
    protected $contentDir = 'contents';

    /**
     * Blade base view directory property.
     *
     * @var string $viewDir
     */
    protected $viewDir = 'admin';

    /**
     * Default page property.
     *
     * @var string $defaultPage
     */
    protected $defaultPage = 'default';

    /**
     * Set mass model binding.
     *
     * @param array $modelBinding The model binding data
     *
     * @return void
     */
    protected function setMassModelBinding(array $modelBinding)
    {
        if (is_array($modelBinding) === true and empty($modelBinding) === false) {
            foreach ($modelBinding as $key => $val) {
                $this->setModelBinding($key, $val);
            }
        }
    }

    /**
     * Set model binding into view.
     *
     * @param string       $modelBindingName   The model binding name that will be sent into view.
     * @param array|object $modelBindingValues The model binding values.
     *
     * @return void
     */
    protected function setModelBinding($modelBindingName, $modelBindingValues)
    {
        # Convert the model binding name to camel case
        $modelBindingName = camel_case($modelBindingName);
        if (isset($this->data[$modelBindingName]) === false) {
            $this->data[$modelBindingName] = new \stdClass();
        }
        if (is_array($modelBindingValues) === true) {
            foreach ($modelBindingValues as $key => $value) {
                # convert all keys name into camel case
                if (is_numeric($key) === true) {
                    $this->data[$modelBindingName]->data[$key] = $value;
                } else {
                    $key = camel_case($key);
                    $this->data[$modelBindingName]->{$key} = $value;
                }
            }
        } elseif (is_object($modelBindingValues) === true) {
            $this->data[$modelBindingName] = $modelBindingValues;
        }
    }

    /**
     * Get the model binding values from model binding name.
     *
     * @param string $modelBindingName The model binding name that want to fetch.
     * @param string $key              The key from model binding.
     *
     * @return object
     */
    protected function getModelBinding($modelBindingName, $key = null)
    {
        $modelBindingValue = null;
        if (isset($this->data[$modelBindingName]) === true) {
            if (empty($key) === false) {
                $modelBindingValue = $this->data[$modelBindingName]->{$key};
            } else {
                $modelBindingValue = $this->data[$modelBindingName];
            }
        }
        return $modelBindingValue;
    }

    /**
     * Set page content blade view.
     *
     * @param string $contentName    The content name that will be set.
     * @param string $contentSegment The content segment name.
     *
     * @return \Illuminate\Http\Response
     */
    protected function renderPage($contentSegment = 'index', $contentName = 'home')
    {
        $bladeFile = $this->viewDir . '.' . $this->defaultPage;
        $checkBladeFile = app_path(
            'views/' . $this->viewDir . '/' . $this->contentDir . '/' . $contentName . '/' . $contentSegment . self::$bladeExt
        );
        if (file_exists($checkBladeFile) === true) {
            $bladeFile = $this->viewDir . '.' . $this->contentDir . '.' . $contentName . '.' . $contentSegment;
        }
        return view($bladeFile, $this->data);
    }
}
