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
    image: test,
  },
  {
    id: 2,
    title: "Plastic and Reconstructive Surgery",
    path: "/medical_solutions/plastic_and_reconstructive_surgery",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 3,
    title: "Ophthalmology",
    path: "/medical_solutions/ophthalmology",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 4,
    title: "Neurology",
    path: "/medical_solutions/neurology",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 5,
    title: "Cardiology",
    path: "/medical_solutions/cardiology",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 6,
    title: "Oncology",
    path: "/medical_solutions/oncology",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 7,
    title: "Urology and Gynecology",
    path: "/medical_solutions/urology_and_gynecology",
    parent: "Medical solutions",
    image: test,
  },
  {
    id: 8,
    title: "Dental",
    path: "/medical_solutions/dental",
    parent: "Medical solutions",
    image: test,
  },
  //labarator
  {
    id: 9,
    title: "Histology Equipment",
    path: "/laboratory_solutions/histology_equipment",
    parent: "Laboratory solutions",
    image: test,
  },
  {
    id: 10,
    title: "Digital Pathology",
    path: "/laboratory_solutions/digital_pathology",
    parent: "Laboratory solutions",
    image: test,
  },
  {
    id: 11,
    title: "Clinic Microscope",
    path: "/laboratory_solutions/clinic_microscope",
    parent: "Laboratory solutions",
    image: test,
  },
  {
    id: 12,
    title: "Histology Consumables",
    path: "/laboratory_solutions/histology_consumables",
    parent: "Laboratory solutions",
    image: test,
  },
  {
    id: 13,
    title: "IHC, ISH, FISH",
    path: "/laboratory_solutions/ihc_ish_fish",
    parent: "Laboratory solutions",
    image: test,
  },
  //geometrical
  {
    id: 14,
    title: "Test Geometrical",
    path: "/geometrical_solutions/test_geometrical",
    parent: "Geometrical solutions",
    image: test,
  },
  //photo
  {
    id: 15,
    title: "Test Photo",
    path: "/photo_solutions/test_photo",
    parent: "Photo solutions",
    image: test,
  },
];
