<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

/**
 * Class SettingsResponse
 * @package OpenLoyalty\SDK\DTO
 */
class SettingsResponse
{
    /**
     * @var array
     */
    private $logo;

    /**
     * @var array
     */
    private $excludedLevelCategories;

    /**
     * @var array
     */
    private $excludedLevelSKUs;

    /**
     * @var array
     */
    private $customerStatusesEarning;

    /**
     * @var array
     */
    private $customerStatusesSpending;

    /**
     * @var array
     */
    private $customersIdentificationPriority;

    /**
     * @var bool
     */
    private $returns;

    /**
     * @var bool
     */
    private $allTimeActive;

    /**
     * @var bool
     */
    private $excludeDeliveryCostsFromTierAssignment;

    /**
     * @var integer
     */
    private $pointsDaysActive;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var string
     */
    private $programName;

    /**
     * @var string
     */
    private $programConditionsUrl;

    /**
     * @var string
     */
    private $programFaqUrl;

    /**
     * @var string
     */
    private $programUrl;

    /**
     * @var string
     */
    private $helpEmailAddress;

    /**
     * @var string
     */
    private $programPointsSingular;

    /**
     * @var string
     */
    private $programPointsPlural;

    /**
     * @var string
     */
    private $tierAssignType;

    /**
     * @var string
     */
    private $defaultFrontendTranslations;

    /**
     * @var string
     */
    private $accountActivationMethod;

    /**
     * @return array
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param array $logo
     */
    public function setLogo(array $logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return array
     */
    public function getExcludedLevelCategories()
    {
        return $this->excludedLevelCategories;
    }

    /**
     * @param array $excludedLevelCategories
     */
    public function setExcludedLevelCategories(array $excludedLevelCategories)
    {
        $this->excludedLevelCategories = $excludedLevelCategories;
    }

    /**
     * @return array
     */
    public function getCustomerStatusesEarning()
    {
        return $this->customerStatusesEarning;
    }

    /**
     * @param array $customerStatusesEarning
     */
    public function setCustomerStatusesEarning(array $customerStatusesEarning)
    {
        $this->customerStatusesEarning = $customerStatusesEarning;
    }

    /**
     * @return array
     */
    public function getCustomerStatusesSpending()
    {
        return $this->customerStatusesSpending;
    }

    /**
     * @param array $customerStatusesSpending
     */
    public function setCustomerStatusesSpending(array $customerStatusesSpending)
    {
        $this->customerStatusesSpending = $customerStatusesSpending;
    }

    /**
     * @return array
     */
    public function getCustomersIdentificationPriority()
    {
        return $this->customersIdentificationPriority;
    }

    /**
     * @param array $customersIdentificationPriority
     */
    public function setCustomersIdentificationPriority(array $customersIdentificationPriority)
    {
        $this->customersIdentificationPriority = $customersIdentificationPriority;
    }

    /**
     * @return bool
     */
    public function isReturns()
    {
        return $this->returns;
    }

    /**
     * @param bool $returns
     */
    public function setReturns($returns)
    {
        $this->returns = boolval($returns);
    }

    /**
     * @return int
     */
    public function getPointsDaysActive()
    {
        return $this->pointsDaysActive;
    }

    /**
     * @param int $pointsDaysActive
     */
    public function setPointsDaysActive($pointsDaysActive)
    {
        $this->pointsDaysActive = intval($pointsDaysActive);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getProgramName()
    {
        return $this->programName;
    }

    /**
     * @param string $programName
     */
    public function setProgramName($programName)
    {
        $this->programName = $programName;
    }

    /**
     * @return string
     */
    public function getProgramPointsSingular()
    {
        return $this->programPointsSingular;
    }

    /**
     * @param string $programPointsSingular
     */
    public function setProgramPointsSingular($programPointsSingular)
    {
        $this->programPointsSingular = $programPointsSingular;
    }

    /**
     * @return string
     */
    public function getProgramPointsPlural()
    {
        return $this->programPointsPlural;
    }

    /**
     * @param string $programPointsPlural
     */
    public function setProgramPointsPlural($programPointsPlural)
    {
        $this->programPointsPlural = $programPointsPlural;
    }

    /**
     * @return string
     */
    public function getTierAssignType()
    {
        return $this->tierAssignType;
    }

    /**
     * @param string $tierAssignType
     */
    public function setTierAssignType($tierAssignType)
    {
        $this->tierAssignType = $tierAssignType;
    }

    /**
     * @return string
     */
    public function getDefaultFrontendTranslations()
    {
        return $this->defaultFrontendTranslations;
    }

    /**
     * @param string $defaultFrontendTranslations
     */
    public function setDefaultFrontendTranslations($defaultFrontendTranslations)
    {
        $this->defaultFrontendTranslations = $defaultFrontendTranslations;
    }

    /**
     * @return string
     */
    public function getAccountActivationMethod()
    {
        return $this->accountActivationMethod;
    }

    /**
     * @param string $accountActivationMethod
     */
    public function setAccountActivationMethod($accountActivationMethod)
    {
        $this->accountActivationMethod = $accountActivationMethod;
    }

    /**
     * @return array
     */
    public function getExcludedLevelSKUs()
    {
        return $this->excludedLevelSKUs;
    }

    /**
     * @param array $excludedLevelSKUs
     */
    public function setExcludedLevelSKUs(array $excludedLevelSKUs)
    {
        $this->excludedLevelSKUs = $excludedLevelSKUs;
    }

    /**
     * @return bool
     */
    public function isAllTimeActive()
    {
        return $this->allTimeActive;
    }

    /**
     * @param bool $allTimeActive
     */
    public function setAllTimeActive($allTimeActive)
    {
        $this->allTimeActive = boolval($allTimeActive);
    }

    /**
     * @return bool
     */
    public function isExcludeDeliveryCostsFromTierAssignment()
    {
        return $this->excludeDeliveryCostsFromTierAssignment;
    }

    /**
     * @param bool $excludeDeliveryCostsFromTierAssignment
     */
    public function setExcludeDeliveryCostsFromTierAssignment($excludeDeliveryCostsFromTierAssignment)
    {
        $this->excludeDeliveryCostsFromTierAssignment = boolval($excludeDeliveryCostsFromTierAssignment);
    }

    /**
     * @return string
     */
    public function getProgramConditionsUrl()
    {
        return $this->programConditionsUrl;
    }

    /**
     * @param string $programConditionsUrl
     */
    public function setProgramConditionsUrl($programConditionsUrl)
    {
        $this->programConditionsUrl = $programConditionsUrl;
    }

    /**
     * @return string
     */
    public function getProgramFaqUrl()
    {
        return $this->programFaqUrl;
    }

    /**
     * @param string $programFaqUrl
     */
    public function setProgramFaqUrl($programFaqUrl)
    {
        $this->programFaqUrl = $programFaqUrl;
    }

    /**
     * @return string
     */
    public function getProgramUrl()
    {
        return $this->programUrl;
    }

    /**
     * @param string $programUrl
     */
    public function setProgramUrl($programUrl)
    {
        $this->programUrl = $programUrl;
    }

    /**
     * @return string
     */
    public function getHelpEmailAddress()
    {
        return $this->helpEmailAddress;
    }

    /**
     * @param string $helpEmailAddress
     */
    public function setHelpEmailAddress($helpEmailAddress)
    {
        $this->helpEmailAddress = $helpEmailAddress;
    }
}
