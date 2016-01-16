<?php
namespace MailMarketing\Http\Controllers\Admin;

use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MailMarketing\Contracts\Crud;

abstract class AbstractAdminController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, AppNamespaceDetectorTrait, Crud;

    /**
     * Blade extension.
     *
     * @var string $bladeExt
     */
    static protected $bladeExt = '.blade.php';

    /**
     * Content Layout directory property.
     *
     * @var string $contentDir
     */
    protected $contentDir;

    /**
     * Page layout directory property.
     *
     * @var string $pageDir
     */
    protected $pageDir = 'partials/contents';

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
     * Controller name.
     *
     * @var string $controllerName
     */
    protected $controllerName;

    /**
     * Breadcrumb file name property.
     *
     * @var string $breadCrumbFileName
     */
    protected $breadCrumbFileName = 'breadcrumb';

    /**
     * Use breadcrumb option.
     *
     * @var boolean $useBreadCrumb
     */
    protected $useBreadCrumb = true;

    /**
     * Enable crud option.
     *
     * @var boolean $enableCrud
     */
    protected $enableCrud = true;

    /**
     * Class constructor.
     */
    protected function __construct()
    {
        # Enable the log query for database.
        \DB::enableQueryLog();
        # Get the controller name for action route purpose.
        $reflectionClass = new \ReflectionClass($this);
        $this->setReferenceKey(camel_case(str_replace('Controller', '', $reflectionClass->getShortName())));
        $this->data['controllerName'] = $this->controllerName = str_replace($this->getAppNamespace() . 'Http\\Controllers\\', '', $reflectionClass->getNamespaceName()) . '\\' . $reflectionClass->getShortName();
        # Set the default active menu and sub menu.
        $this->data['activeMenu'] = 'dashboard';
        $this->data['activeSubMenu'] = '';
        $this->data['model'] = null;
        $this->data['buttons'] = null;
        $this->data['breadCrumb'] = null;
        $this->initCrud();
        $this->loadJs();
        $this->loadCss();
        # Check if has breadcrumb file.
        $this->setUseBreadCrumb(true);
    }

    /**
     * Get use breadcrumb status.
     *
     * @return boolean
     */
    public function isUseBreadCrumb()
    {
        return $this->useBreadCrumb;
    }

    /**
     * Set use breadcrumb option property.
     *
     * @param boolean $useBreadCrumb Breadcrumb parameter.
     *
     * @return void
     */
    public function setUseBreadCrumb($useBreadCrumb)
    {
        $this->useBreadCrumb = $useBreadCrumb;
        $this->data['useBreadCrumb'] = $useBreadCrumb;
    }

    /**
     * Get the enable crud status property.
     *
     * @return boolean
     */
    protected function isEnableCrud()
    {
        return $this->enableCrud;
    }

    /**
     * Set option for enable crud option property.
     *
     * @param boolean $enableCrud Enable crud flag parameter.
     *
     * @return void
     */
    protected function setEnableCrud($enableCrud)
    {
        $this->enableCrud = $enableCrud;
    }

    /**
     * Load javascript files.
     *
     * @return void
     */
    protected function loadJs()
    {
        $this->data['js'] = [];
    }

    /**
     * Load stylesheets files.
     *
     * @return void
     */
    protected function loadCss()
    {
        $this->data['css'] = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        $this->setRead();
        return $this->renderPage('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        $this->setCreate();
        if (array_key_exists('formAction', $this->data) === false) {
            $this->data['formAction'] = action($this->controllerName . '@store');
        }
        $this->data['css'][] = asset('/assets/css/detail.css');
        return $this->renderPage('detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    protected function edit($id)
    {
        $this->setUpdate();
        if (array_key_exists('formAction', $this->data) === false) {
            $this->data['formAction'] = action($this->controllerName . '@update', $id);
        }
        $this->data['css'][] = asset('/assets/css/detail.css');
        $this->data['referenceValue'] = $this->getReferenceValue();
        return $this->renderPage('detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id Row ID of model that want to show.
     *
     * @return \Illuminate\Http\Response
     */
    protected function show($id)
    {
        # @todo parent show method.
        return 'showed';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id Row ID of model that want to show.
     *
     * @return \Illuminate\Http\Response
     */
    protected function destroy($id)
    {
        # @todo parent destroy method
        return 'deleted';
    }

    /**
     * Initiation CRUD of class.
     *
     * @return void
     */
    protected function initCrud()
    {
        # Create the link action.
        $this->data['indexLinkAction'] = action($this->controllerName . '@index');
        if ($this->isEnableCrud() === true and $this->isEnableCreate() === true) {
            $this->data['createLinkAction'] = action($this->controllerName . '@create');
        }
    }

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
     * @param string $contentSegment The content segment name.
     * @param string $contentName    The content name that will be set.
     *
     * @return \Illuminate\Http\Response|string
     */
    protected function renderPage($contentSegment = 'index', $contentName = null)
    {
        $this->data['breadCrumb'] = $this->renderPartialView('breadcrumb', $contentName);
        if ($this->data['breadCrumb'] === '') {
            $this->setUseBreadCrumb(false);
        }
        if (request()->isMethod('post') === true and request()->ajax() === true) {
            # @todo ajax response handle.
            return null;
        } else {
            return $this->renderPartialView($contentSegment, $contentName, true);
        }
    }

    /**
     * Render partial view.
     *
     * @param string  $contentSegment The content segment name.
     * @param string  $contentName    The content name that will be set.
     * @param boolean $useDefault     Use default page option parameter.
     * @param boolean $buffer         The buffer option parameter.
     *
     * @return \Illuminate\Http\Response|string
     */
    protected function renderPartialView($contentSegment = 'index', $contentName = null, $useDefault = false, $buffer = false)
    {
        if ($contentName === null or trim($contentName) === '') {
            $contentName = $this->contentDir;
        }
        $contentPath = 'resources/views/' . $this->viewDir . '/' . $this->pageDir . '/' . $contentName . '/';
        if (file_exists(base_path($contentPath . $contentSegment . self::$bladeExt)) === true) {
            $contentBlade = $this->viewDir . '.' . $this->pageDir . '.' . $contentName . '.' . $contentSegment;
        } else {
            if ($useDefault === true) {
                $contentBlade = $this->viewDir . '.' . $this->defaultPage;
            } else {
                return '';
            }
        }
        if ($buffer === true) {
            return view($contentBlade, $this->data)->render();
        } else {
            return view($contentBlade, $this->data);
        }
    }
}
