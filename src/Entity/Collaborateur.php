<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Collaborateur
 *
 * @ORM\Table(name="collaborateur", indexes={@ORM\Index(name="fk_avantages_idx", columns={"id_avantages"}), @ORM\Index(name="fk_coeficients_idx", columns={"id_coeficients"}), @ORM\Index(name="fk_contrats_idx", columns={"id_contrats"}), @ORM\Index(name="fk_diplomes_idx", columns={"id_diplomes"}), @ORM\Index(name="fk_duree_contrat_idx", columns={"id_contrat_duree"}), @ORM\Index(name="fk_echelons_idx", columns={"id_echelons"}), @ORM\Index(name="fk_evenements_idx", columns={"id_evenements"}), @ORM\Index(name="fk_idx", columns={"id_sexe"}), @ORM\Index(name="fk_niveaux_idx", columns={"id_niveaux"}), @ORM\Index(name="fk_postes_idx", columns={"id_postes"}), @ORM\Index(name="fk_role", columns={"id_role"}), @ORM\Index(name="fk_secteurs_idx", columns={"id_secteurs"}), @ORM\Index(name="fk_situations_idx", columns={"id_situations"}), @ORM\Index(name="fk_societes_idx", columns={"id_societes"})})
 * @ORM\Entity(repositoryClass="App\Repository\CollaborateurRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message ="Cet Email est déjà enregistré"
 * )
 */
class Collaborateur implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=80, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=80, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=false)
     * @Assert\Length(min="6", minMessage="Votre mot de passe est trop court")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Votre mot de passe doit correspondre")
     */
    private $password;


    /**
     *@Assert\EqualTo(propertyPath="password",message="Votre mot de passe doit correspondre")
     */
    public $confirm_password;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone_mobile", type="string", length=15, nullable=true)
     */
    private $telephoneMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nombre_enfant", type="integer", nullable=true)
     */
    private $nombreEnfant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_carte_vital", type="string", length=20, nullable=true)
     */
    private $numCarteVital;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_carte_pro", type="string", length=255, nullable=true)
     */
    private $numCartePro;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_contrat_debut", type="datetime", nullable=true)
     */
    private $dateContratDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_contrat_fin", type="datetime", nullable=true)
     */
    private $dateContratFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site_affectation", type="string", length=255, nullable=true)
     */
    private $siteAffectation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="salaire_mensuel_brut", type="integer", nullable=true)
     */
    private $salaireMensuelBrut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_dpae", type="datetime", nullable=true)
     */
    private $dateDpae;

    /**
     * @var string|null
     *
     * @ORM\Column(name="matricule", type="string", length=255, nullable=true)
     */
    private $matricule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motif_sortie", type="text", length=65535, nullable=true)
     */
    private $motifSortie;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isvalid", type="boolean", nullable=true)
     */
    private $isvalid = '0';

    /**
     * @var \Avantage
     *
     * @ORM\ManyToOne(targetEntity="Avantage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avantages", referencedColumnName="id")
     * })
     */
    private $idAvantages;

    /**
     * @var \Coeficient
     *
     * @ORM\ManyToOne(targetEntity="Coeficient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coeficients", referencedColumnName="id")
     * })
     */
    private $idCoeficients;

    /**
     * @var \RContrat
     *
     * @ORM\ManyToOne(targetEntity="RContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contrats", referencedColumnName="id")
     * })
     */
    private $idContrats;

    /**
     * @var \Diplome
     *
     * @ORM\ManyToOne(targetEntity="Diplome")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_diplomes", referencedColumnName="id")
     * })
     */
    private $idDiplomes;

    /**
     * @var \RDureeContrat
     *
     * @ORM\ManyToOne(targetEntity="RDureeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contrat_duree", referencedColumnName="id")
     * })
     */
    private $idContratDuree;

    /**
     * @var \Echelon
     *
     * @ORM\ManyToOne(targetEntity="Echelon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_echelons", referencedColumnName="id")
     * })
     */
    private $idEchelons;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evenements", referencedColumnName="id")
     * })
     */
    private $idEvenements;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_niveaux", referencedColumnName="id")
     * })
     */
    private $idNiveaux;

    /**
     * @var \Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_postes", referencedColumnName="id")
     * })
     */
    private $idPostes;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id")
     * })
     */
    private $idRole;

    /**
     * @var \Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_secteurs", referencedColumnName="id")
     * })
     */
    private $idSecteurs;

    /**
     * @var \RSexe
     *
     * @ORM\ManyToOne(targetEntity="RSexe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sexe", referencedColumnName="id")
     * })
     */
    private $idSexe;

    /**
     * @var \RSituationFamilliale
     *
     * @ORM\ManyToOne(targetEntity="RSituationFamilliale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_situations", referencedColumnName="id")
     * })
     */
    private $idSituations;

    /**
     * @var \Societe
     *
     * @ORM\ManyToOne(targetEntity="Societe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_societes", referencedColumnName="id")
     * })
     */
    private $idSocietes;

      /**
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephoneMobile(): ?string
    {
        return $this->telephoneMobile;
    }

    public function setTelephoneMobile(?string $telephoneMobile): self
    {
        $this->telephoneMobile = $telephoneMobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNombreEnfant(): ?int
    {
        return $this->nombreEnfant;
    }

    public function setNombreEnfant(?int $nombreEnfant): self
    {
        $this->nombreEnfant = $nombreEnfant;

        return $this;
    }

    public function getNumCarteVital(): ?string
    {
        return $this->numCarteVital;
    }

    public function setNumCarteVital(?string $numCarteVital): self
    {
        $this->numCarteVital = $numCarteVital;

        return $this;
    }

    public function getNumCartePro(): ?string
    {
        return $this->numCartePro;
    }

    public function setNumCartePro(?string $numCartePro): self
    {
        $this->numCartePro = $numCartePro;

        return $this;
    }

    public function getDateContratDebut(): ?\DateTimeInterface
    {
        return $this->dateContratDebut;
    }

    public function setDateContratDebut(?\DateTimeInterface $dateContratDebut): self
    {
        $this->dateContratDebut = $dateContratDebut;

        return $this;
    }

    public function getDateContratFin(): ?\DateTimeInterface
    {
        return $this->dateContratFin;
    }

    public function setDateContratFin(?\DateTimeInterface $dateContratFin): self
    {
        $this->dateContratFin = $dateContratFin;

        return $this;
    }

    public function getSiteAffectation(): ?string
    {
        return $this->siteAffectation;
    }

    public function setSiteAffectation(?string $siteAffectation): self
    {
        $this->siteAffectation = $siteAffectation;

        return $this;
    }

    public function getSalaireMensuelBrut(): ?int
    {
        return $this->salaireMensuelBrut;
    }

    public function setSalaireMensuelBrut(?int $salaireMensuelBrut): self
    {
        $this->salaireMensuelBrut = $salaireMensuelBrut;

        return $this;
    }

    public function getDateDpae(): ?\DateTimeInterface
    {
        return $this->dateDpae;
    }

    public function setDateDpae(?\DateTimeInterface $dateDpae): self
    {
        $this->dateDpae = $dateDpae;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMotifSortie(): ?string
    {
        return $this->motifSortie;
    }

    public function setMotifSortie(?string $motifSortie): self
    {
        $this->motifSortie = $motifSortie;

        return $this;
    }

    public function getIsvalid(): ?bool
    {
        return $this->isvalid;
    }

    public function setIsvalid(?bool $isvalid): self
    {
        $this->isvalid = $isvalid;

        return $this;
    }

    public function getIdAvantages(): ?Avantage
    {
        return $this->idAvantages;
    }

    public function setIdAvantages(?Avantage $idAvantages): self
    {
        $this->idAvantages = $idAvantages;

        return $this;
    }

    public function getIdCoeficients(): ?Coeficient
    {
        return $this->idCoeficients;
    }

    public function setIdCoeficients(?Coeficient $idCoeficients): self
    {
        $this->idCoeficients = $idCoeficients;

        return $this;
    }

    public function getIdContrats(): ?RContrat
    {
        return $this->idContrats;
    }

    public function setIdContrats(?RContrat $idContrats): self
    {
        $this->idContrats = $idContrats;

        return $this;
    }

    public function getIdDiplomes(): ?Diplome
    {
        return $this->idDiplomes;
    }

    public function setIdDiplomes(?Diplome $idDiplomes): self
    {
        $this->idDiplomes = $idDiplomes;

        return $this;
    }

    public function getIdContratDuree(): ?RDureeContrat
    {
        return $this->idContratDuree;
    }

    public function setIdContratDuree(?RDureeContrat $idContratDuree): self
    {
        $this->idContratDuree = $idContratDuree;

        return $this;
    }

    public function getIdEchelons(): ?Echelon
    {
        return $this->idEchelons;
    }

    public function setIdEchelons(?Echelon $idEchelons): self
    {
        $this->idEchelons = $idEchelons;

        return $this;
    }

    public function getIdEvenements(): ?Evenement
    {
        return $this->idEvenements;
    }

    public function setIdEvenements(?Evenement $idEvenements): self
    {
        $this->idEvenements = $idEvenements;

        return $this;
    }

    public function getIdNiveaux(): ?Niveau
    {
        return $this->idNiveaux;
    }

    public function setIdNiveaux(?Niveau $idNiveaux): self
    {
        $this->idNiveaux = $idNiveaux;

        return $this;
    }

    public function getIdPostes(): ?Poste
    {
        return $this->idPostes;
    }

    public function setIdPostes(?Poste $idPostes): self
    {
        $this->idPostes = $idPostes;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getIdSecteurs(): ?Secteur
    {
        return $this->idSecteurs;
    }

    public function setIdSecteurs(?Secteur $idSecteurs): self
    {
        $this->idSecteurs = $idSecteurs;

        return $this;
    }

    public function getIdSexe(): ?RSexe
    {
        return $this->idSexe;
    }

    public function setIdSexe(?RSexe $idSexe): self
    {
        $this->idSexe = $idSexe;

        return $this;
    }

    public function getIdSituations(): ?RSituationFamilliale
    {
        return $this->idSituations;
    }

    public function setIdSituations(?RSituationFamilliale $idSituations): self
    {
        $this->idSituations = $idSituations;

        return $this;
    }

    public function getIdSocietes(): ?Societe
    {
        return $this->idSocietes;
    }

    public function setIdSocietes(?Societe $idSocietes): self
    {
        $this->idSocietes = $idSocietes;

        return $this;
    }
    public function __toString() {
    return "";
    }

    public function getUsername(){}


    public function eraseCredentials(){}

    public function getSalt(){}

    public function getRoles(){
        return ["ROLE_USER"];
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken): void
    {
        $this->resetToken = $resetToken;
    }

}
