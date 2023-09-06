import React from "react";
import "./Skeleton.scss";

export default function Skeleton({ type }) {
  const routes = 4;

  const SkeletonHeader = () => <div className="skeleton__header"></div>;

  if (type === "header") {
    const skeletons = Array.from({ length: routes }, (_, index) => (
      <SkeletonHeader key={index} />
    ));

    return skeletons;
  }

  //
  const cards = 5;

  const SkeletonCard = () => <div className="skeleton__cards-card"></div>;

  if (type === "cards") {
    const skeletons = Array.from({ length: cards }, (_, index) => (
      <SkeletonCard key={index} />
    ));

    return skeletons;
  }

  return null;
}
