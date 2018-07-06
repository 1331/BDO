<?php

namespace BDO\Domain\Company;

interface CompanyInterface{

    /**
     * Gets the Id of company
	 * @return int
     */
    public function getId();

    /**
     * Gets the Name of company
	 * @return string
     */
    public function getName();

    /**
     * Gets the NameFantasy of company
	 * @return string
     */
    public function getNameFantasy();

    /**
     * Gets the Cnpj of company
	 * @return string
     */
    public function getCnpj();

    /**
     * Gets the NameContact of company
	 * @return string
     */
    public function getNameContact();

    /**
     * Gets the PhoneCompany of company
	 * @return string
     */
    public function getPhoneCompany();

    /**
     * Gets the Cep of company
	 * @return string
     */
    public function getCep();

    /**
     * Gets the PublicPlace of company
	 * @return string
     */
    public function getPublicPlace();

    /**
     * Gets the HouseNumber of company
	 * @return int
     */
    public function getHouseNumber();

    /**
     * Gets the Complement of company
	 * @return string
     */
    public function getComplement();

    /**
     * Gets the City of company
	 * @return \App\Infrastructure\Eloquent\City\City
     */
    public function getCity();

    /**
     * Gets the Email of company
	 * @return string
     */
    public function getEmail();

    /**
     * Gets the Site of company
	 * @return string
     */
    public function getSite();

    /**
     * Gets the StateRegistration of company
	 * @return string
     */
    public function getStateRegistration();

    /**
     * Gets the MunicipalRegistartioin of company
	 * @return string
     */
    public function getMunicipalRegistartioin();

    /**
     * Gets the DateFoundation of company
	 * @return \Carbon\Carbon
     */
    public function getDateFoundation();

    /**
     * Gets the release of company
	 * @return bool
     */
    public function isRelease();

    /**
     * Gets the PasswordPortal of company
	 * @return string
     */
    public function getPasswordPortal();

    /**
     * Gets the internal of company
	 * @return bool
     */
    public function isInternal();

    /**
     * Gets the ActivyBranch of company
	 * @return \App\Infrastructure\Eloquent\ActivyBranch\ActivyBranch
     */
    public function getActivyBranch();

    /**
     * Gets the CompanyType of company
	 * @return \App\Infrastructure\Eloquent\Company\CompanyType
     */
    public function getCompanyType();

    /**
     * Gets the AmountEmployee of company
	 * @return \App\Infrastructure\Eloquent\Company\AmountEmployee
     */
    public function getAmountEmployee();

    /**
     * Gets the OwnerName of company
	 * @return string
     */
    public function getOwnerName();

    /**
     * Gets the JobRole of company
	 * @return string
     */
    public function getJobRole();

    /**
     * Gets the Cpf of company
	 * @return string
     */
    public function getCpf();

    /**
     * Gets the DateBirth of company
	 * @return \Carbon\Carbon
     */
    public function getDateBirth();

    /**
     * Gets the CellPhone of company
	 * @return string
     */
    public function getCellPhone();

    /**
     * Gets the OwnerEmail of company
	 * @return string
     */
    public function getOwnerEmail();

    /**
     * Gets the status of company
	 * @return bool
     */
    public function isStatus();

    /**
     * Gets the recruiter of company
	 * @return bool
     */
    public function isRecruiter();

    /**
     * Gets the MicroRegion of company
	 * @return \App\Infrastructure\Eloquent\Regions\MicroRegion
     */
    public function getMicroRegion();

    /**
     * Gets the Polygon of company
	 * @return \App\Infrastructure\Eloquent\Regions\Polygon
     */
    public function getPolygon();

    /**
     * Gets the DateRegister of company
	 * @return \Carbon\Carbon\
     */
    public function getDateRegister();

    /**
     * Gets the seal of company
	 * @return bool
     */
    public function isSeal();
}
