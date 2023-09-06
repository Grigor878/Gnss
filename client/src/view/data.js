import test from "../assets/imgs/test.png";

export const productsMain = [
  {
    id: 1,
    title: "Medical solutions",
    path: "/medical_solutions",
    image: test,
  },
  {
    id: 2,
    title: "Laboratory solutions",
    path: "/laboratory_solutions",
    image: test,
  },
  {
    id: 3,
    title: "Geometrical solutions",
    path: "/geometrical_solutions",
    image: test,
  },
  {
    id: 4,
    title: "Photo solutions",
    path: "/photo_solutions",
    image: test,
  },
];

export const productsSub = [
  //medical
  {
    id: 1,
    title: "ENT",
    path: "/medical_solutions/ent",
    parent: "Medical solutions",
  },
  {
    id: 2,
    title: "PLASTIC AND RECONSTRUCTIVE SURGERY",
    path: "/medical_solutions/plastic_and_reconstructive_surgery",
    parent: "Medical solutions",
  },
  {
    id: 3,
    title: "OPHTHALMOLOGY",
    path: "/medical_solutions/ophthalmology",
    parent: "Medical solutions",
  },
  {
    id: 4,
    title: "NEUROLOGY",
    path: "/medical_solutions/neurology",
    parent: "Medical solutions",
  },
  {
    id: 5,
    title: "CARDIOLOGY",
    path: "/medical_solutions/cardiology",
    parent: "Medical solutions",
  },
  {
    id: 6,
    title: "ONCOLOGY",
    path: "/medical_solutions/oncology",
    parent: "Medical solutions",
  },
  {
    id: 7,
    title: "UROLOGY AND GYNECOLOGY",
    path: "/medical_solutions/urology_and_gynecology",
    parent: "Medical solutions",
  },
  {
    id: 8,
    title: "DENTAL",
    path: "/medical_solutions/dental",
    parent: "Medical solutions",
  },
  //labarator
  {
    id: 9,
    title: "HISTOLOGY EQUIPMENT",
    path: "/laboratory_solutions/histology_equipment",
    parent: "Laboratory solutions",
  },
  {
    id: 10,
    title: "DIGITAL PATHOLOGY",
    path: "/laboratory_solutions/digital_pathology",
    parent: "Laboratory solutions",
  },
  {
    id: 11,
    title: "CLINIC MICROSCOPE",
    path: "/laboratory_solutions/clinic_microscope",
    parent: "Laboratory solutions",
  },
  {
    id: 12,
    title: "HISTOLOGY CONSUMABLES",
    path: "/laboratory_solutions/histology_consumables",
    parent: "Laboratory solutions",
  },
  {
    id: 13,
    title: "IHC, ISH, FISH",
    path: "/laboratory_solutions/ihc_ish_fish",
    parent: "Laboratory solutions",
  },
  //geometrical
  {
    id: 14,
    title: "Test geometrical",
    path: "/geometrical_solutions/test_geometrical",
    parent: "Geometrical solutions",
  },
  //photo
  {
    id: 15,
    title: "Test photo",
    path: "/photo_solutions/test_photo",
    parent: "Photo solutions",
  },
];
